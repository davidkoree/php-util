<?php
//MERGE_SORT
$a = [5, 9, 3, 1, 2, 10, 11, 14, 13, 12, 15, 8, 4, 7, 6];
//$a = array_reverse(range(1, 15));
echo implode(', ', $a)."\n";
$start_time = microtime(1);

function mergeSort($a, $b) {
    $c = [];
    while ( ($a_one=current($a)) !== false && ($b_one=current($b)) !== false ) {
        if ($a_one < $b_one) {
            $c[] = $a_one;
            next($a);
        } else {
            $c[] = $b_one;
            next($b);
        }
    }
    while (($a_one=current($a)) !== false) {
        $c[] = $a_one;
        next($a);
    }
    while (($b_one=current($b)) !== false) {
        $c[] = $b_one;
        next($b);
    }

    return $c;
}

function splitMergeSort($a) {
    while (($len=count($a)) >= 2) {
        $cut_point = floor($len/2);
        $a_half_left = array_slice($a, 0, $cut_point);
        $a_half_right = array_slice($a, $cut_point);
        return mergeSort(splitMergeSort($a_half_left), splitMergeSort($a_half_right));
    }

    return $a;
}

$a = splitMergeSort($a);

$time_consumed = microtime(1) - $start_time;
echo "TIME CONSUMED: " . $time_consumed . "s\n";

echo implode(', ', $a)."\n";
