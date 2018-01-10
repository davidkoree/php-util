<?php
/**
 * @refer http://php.net/manual/en/book.spl.php
 */
/* 列表枢纽，可持有一些公共字典、映射关系等 */
class List_Hub {
    private $__storage = array();
    public static function registListByType(Iterator $data, $type) {
        $this->__storage[$type] = $data;
    }
    public static function getListByType($type) {
        if (isset($this->__storage[$type])) {
            return $this->__storage[$type];
        }
        return NULL;
    }
}
/* 列表对象，执行统一的操作调度，内部将数组转换为迭代器 */
class List_Object {
    private $__data = NULL;
    private $__id_key = NULL;
    public function __construct($data, $id_key = '') {
        $this->__data = new ArrayIterator($data);
        if (!empty($id_key)) {
            $this->__id_key = $id_key;
        }
    }
    public function setData($data) {
        $this->__data = new ArrayIterator($data);
    }
    public function getData() {
        return $this->__data;
    }
    public function setIDKey($id_key) {
        $this->__id_key = $id_key;
    }
    public function getIDKey() {
        return $this->__id_key;
    }
    public function getIDs() {
        if (!($this->__data instanceof ArrayIterator)) {
            return array();
        }
        $arr = array();
        $this->__data->rewind();
        while ($this->__data->valid()) {
            $v = $this->__data->current();
            $id = $v[$this->__id_key];
            $arr[] = $id;
            $this->__data->next();
        }
        return $arr;
    }
    public function getListArray() {
        if (!($this->__data instanceof ArrayIterator)) {
            return array();
        }
        $arr_data = $this->__data->getArrayCopy();
        return $arr_data;
    }
    public function getListCount() {
        if (!($this->__data instanceof ArrayIterator)) {
            return 0;
        }
        return $this->__data->count();
    }
    public function wrapValue($key, $callable) {
        iterator_apply($this->__data, $callable, array($this->__data, $key));
    }
    public function attachSubList(List_Object $sub_list, $key, $callable) {
        $sub_data = array();
        $i = $sub_list->getData();
        $id_key = $sub_list->getIDKey();
        $i->rewind();
        while ($i->valid()) {
            $v = $i->current();
            $id = $v[$id_key];
            $sub_data[$id] = $v;
            $i->next();
        }
        iterator_apply($this->__data, $callable, array($this->__data, $this->__id_key, $sub_data, $key));
    }
    public function wrapList($callable) {
        iterator_apply($this->__data, $callable, array($this->__data));
    }
    public function getListGroupByIDKey() {
        $arr = array();
        $this->__data->rewind();
        while ($this->__data->valid()) {
            $v = $this->__data->current();
            $id = $v[$this->__id_key];
            $arr[$id][] = $v;
            $this->__data->next();
        }
        $group_arr = array();
        foreach ($arr as $id => $rows) {
            $group_arr[] = array($this->__id_key=>$id, 'rows'=>$rows);
        }
        $list = new List_Object($group_arr, $this->__id_key);
        return $list;
    }
}
/* 列表包装类，内置了各种操作列表数据的函数，RD根据业务需要，不断扩写 */
class List_Wrapper_PC {
    // 考虑一种方法名的约定：
    // func_* 针对列表某个字段的处理
    // append_* 针对父子节点组装的处理
    // setup_list* 针对列表的整体处理
    public static function func_upper_name(Iterator $i, $key) {
        $k = $i->key();
        $v = $i->current();
        $v[$key] = ucfirst($v[$key]);
        $i->offsetSet($k, $v);
        return TRUE; // 这里必须返回TRUE才能正常执行迭代
    }
    public static function append_address(Iterator $i, $id_key, $sub_data, $key) {
        $k = $i->key();
        $v = $i->current();
        $id = $v[$id_key];
        foreach ($sub_data as $sub_id => $row) {
            // 父子节点的ID一致，表明是同一组相关的数据
            if ($sub_id == $id) {
                // 这里可以实现更多的处理$row数据的代码
                $v[$key] = $row;
                $i->offsetSet($k, $v);
                break;
            }
        }
        return TRUE; // 这里必须返回TRUE才能正常执行迭代
    }
    public static function append_career(Iterator $i, $id_key, $sub_data, $key) {
        $k = $i->key();
        $v = $i->current();
        $id = $v[$id_key];
        $arr = array();
        foreach ($sub_data as $sub_id => $row) {
            // 父子节点的ID一致，表明是同一组相关的数据
            if ($sub_id == $id) {
                foreach ($row['rows'] as $r) {
                    $arr[] = sprintf('work at %s on %s', $r['work_at'], $r['year']);
                }
            }
        }
        $v[$key] = $arr;
        $i->offsetSet($k, $v);
        return TRUE; // 这里必须返回TRUE才能正常执行迭代
    }
    public static function setup_list(Iterator $i) {
        $k = $i->key();
        $v = $i->current();
        // 新增buyer_url字段
        $v['buyer_url'] = 'i.domain.com/u/' . $v['id'];
        // 这里可以实现更多的处理$v数据的代码
        $i->offsetSet($k, $v);
        return TRUE; // 这里必须返回TRUE才能正常执行迭代
    }
}
/***** 列表数据的组装过程如下 *****/
/* 确定父节点列表数据：用户基本信息 */
$user_data = array(
    array('id'=>101, 'name'=>'tom', 'age'=>23),
    array('id'=>102, 'name'=>'jerry', 'age'=>22),
    array('id'=>103, 'name'=>'mini', 'age'=>21),
);
/* 确定子节点列表数据：用户地址信息 */
$addr_data = array(
    // set user_id as ID
    array('user_id'=>101, 'address'=>'Hong Kong'),
    array('user_id'=>102, 'address'=>'Tai Pei'),
    array('user_id'=>103, 'address'=>'Macau'),
);
/* 多个重复id的子节点列表数据：工作经历 */
$career_data = array(
    array('user_id'=>101, 'year'=>'2011', 'work_at' => 'SOHU'),
    array('user_id'=>101, 'year'=>'2014', 'work_at' => 'SINA'),
    array('user_id'=>101, 'year'=>'2016', 'work_at' => 'BAIDU'),
    array('user_id'=>102, 'year'=>'2005', 'work_at' => 'NETEASE'),
    array('user_id'=>103, 'year'=>'2001', 'work_at' => 'YAHOO'),
    array('user_id'=>103, 'year'=>'2004', 'work_at' => 'GOOGLE'),
);
// 父节点列表的初始化
$user_list = new List_Object($user_data, 'id');
// 输出父节点列表的一些信息
$user_ids = $user_list->getIDs();
echo "user_ids:" . implode(',', $user_ids) . "\n";
$user_list_count = $user_list->getListCount();
echo "user_count:" . $user_list_count . "\n";
$user_list_data = $user_list->getListArray();
echo "user_list:" . var_export($user_list_data, true) . "\n";
// 操作父节点列表的某个字段
$user_list->wrapValue('name', 'List_Wrapper_PC::func_upper_name');
// 子节点列表初始化 并将子节点嫁接到对应的父节点
$addr_list = new List_Object($addr_data);
$addr_list->setIDKey('user_id');
$user_list->attachSubList($addr_list, 'address_info', 'List_Wrapper_PC::append_address');
$career_list = new List_Object($career_data);
$career_list->setIDKey('user_id');
$grouped_career_list = $career_list->getListGroupByIDKey();
$user_list->attachSubList($grouped_career_list, 'career', 'List_Wrapper_PC::append_career');
// 继续操作父节点列表
$user_list->wrapList('List_Wrapper_PC::setup_list');
// 输出父节点的列表数据
$user_list_data = $user_list->getListArray();
echo "user_list:" . var_export($user_list_data, true) . "\n";

/**
代码输出
user_ids:101,102,103
user_count:3
user_list:array (
  0 =>
  array (
    'id' => 101,
    'name' => 'tom',
    'age' => 23,
  ),
  1 =>
  array (
    'id' => 102,
    'name' => 'jerry',
    'age' => 22,
  ),
  2 =>
  array (
    'id' => 103,
    'name' => 'mini',
    'age' => 21,
  ),
)
user_list:array (
  0 =>
  array (
    'id' => 101,
    'name' => 'Tom',
    'age' => 23,
    'address_info' =>
    array (
      'user_id' => 101,
      'address' => 'Hong Kong',
    ),
    'career' =>
    array (
      0 => 'work at SOHU on 2011',
      1 => 'work at SINA on 2014',
      2 => 'work at BAIDU on 2016',
    ),
    'buyer_url' => 'i.domain.com/u/101',
  ),
  1 =>
  array (
    'id' => 102,
    'name' => 'Jerry',
    'age' => 22,
    'address_info' =>
    array (
      'user_id' => 102,
      'address' => 'Tai Pei',
    ),
    'career' =>
    array (
      0 => 'work at NETEASE on 2005',
    ),
    'buyer_url' => 'i.domain.com/u/102',
  ),
  2 =>
  array (
    'id' => 103,
    'name' => 'Mini',
    'age' => 21,
    'address_info' =>
    array (
      'user_id' => 103,
      'address' => 'Macau',
    ),
    'career' =>
    array (
      0 => 'work at YAHOO on 2001',
      1 => 'work at GOOGLE on 2004',
    ),
    'buyer_url' => 'i.domain.com/u/103',
  ),
)
*/
