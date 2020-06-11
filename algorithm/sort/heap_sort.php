<?php
//HEAP_SORT
$a = [5, 9, 3, 1, 2, 10, 11, 14, 13, 12, 15, 8, 4, 7, 6];
//$a = array_reverse(range(1, 15));
echo implode(', ', $a)."\n";
$start_time = microtime(1);

function swapValue(&$a, $i, $p) {
    $temp = $a[$i];
    $a[$i] = $a[$p];
    $a[$p] = $temp;
}

function getHeapHead() {
    return 1;
}

function getHeapTail($a) {
    return count($a);
}

function getLeftChild($i) {
    return $i*2;
}

function getRightChild($i) {
    return $i*2+1;
}

function getParent($i) {
    if ($i == 1) {
        return false;
    }
    return floor($i/2);
}

function heapIn(&$a) {
    $tail = getHeapTail($a);
    array_unshift($a, false);
    for ($i = 1; $i <= $tail; $i++) {
        $j = $i;
        $a[$i] = $a[$j];
        while ($p = getParent($j)) {
            if ($a[$j] > $a[$p]) {
                swapValue($a, $j, $p);
                $j = $p;
            } else {
                break;
            }
        }
    }
    array_shift($a);
}

function heapOut(&$a) {
    $tail = getHeapTail($a);
    array_unshift($a, false);
    for ($i = 1; $i < $tail; $i++) {
        $last_one = $a[$tail-$i+1];
        $big_one = $a[1];
        $a[$tail-$i+1] = $big_one;
        $a[1] = $last_one;
        $j = 1;
        $len = $tail - $i;

        if ($len == 2) {
            if ($a[1] > $a[2]) {
                swapValue($a, 1, 2);
            }
            break;
        }

        while ( ($l=getLeftChild($j)) <= $len && ($r=getRightChild($j)) <= $len ) {
            if ($a[$l] > $a[$j]) {
                swapValue($a, $l, $j);
            }
            if ($a[$r] > $a[$j]) {
                swapValue($a, $r, $j);
            }
            ++$j;
        }
    }
    array_shift($a);
}

heapIn($a);
heapOut($a);

$time_consumed = microtime(1) - $start_time;
echo "TIME CONSUMED: " . $time_consumed . "s\n";

echo implode(', ', $a)."\n";
