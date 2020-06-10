<?php
//QUICK_SORT
$a = [5, 9, 3, 1, 2, 10, 11, 14, 13, 12, 15, 8, 4, 7, 6];
//$a = array_reverse(range(1, 15));
echo implode(', ', $a)."\n";
$start_time = microtime(1);

function swapValue(&$a, $i, $p) {
    $temp = $a[$i];
    $a[$i] = $a[$p];
    $a[$p] = $temp;
}
 
function quickSort($a, $l = 0, $r = 0) {
    if (($len=count($a)) < 2) {
        return $a;
    }
    $p = $len-1;
    $l = ($l == 0 ? 0 : $l);
    $r = ($r == 0 ? ($len-2) : $r);
    if ($l == $r) {
        if ($a[$l] > $a[$p]) {
            swapValue($a, $l, $p);
        }
        return $a;
    }

    while (($l < $p) && ($a[$l] <= $a[$p])) {
        ++$l;
    }
    if ($l == $p) {
        $left_sequence = array_slice($a, 0, $p);
        $right_sequence = [$a[$p]];
        return array_merge(quickSort($left_sequence), quickSort($right_sequence));
    }

    while (($r > $l) && ($a[$r] >= $a[$p])) {
        --$r;
    }
    if ($r == $l && $l == 0) {
        $left_sequence = [$a[$p]];
        $right_sequence = array_slice($a, 0, $p);
        return array_merge(quickSort($left_sequence), quickSort($right_sequence));
    }

    if ($l != $r) {
        if ($a[$l] > $a[$r]) {
            swapValue($a, $l, $r);
            return quickSort($a, $l, $r);
        }
    } else {
        if ($a[$l] > $a[$p]) {
            swapValue($a, $l, $p);
        }
        $p = $l;
        $left_sequence = array_slice($a, 0, $p);
        $right_sequence = array_slice($a, $p+1);
        return array_merge(quickSort($left_sequence), [$a[$p]], quickSort($right_sequence));
    }
}

$a = quickSort($a);

$time_consumed = microtime(1) - $start_time;
echo "TIME CONSUMED: " . $time_consumed . "s\n";

echo implode(', ', $a)."\n";
