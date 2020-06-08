<?php
//BUBBLE_SORT
$a = [5, 9, 3, 1, 2, 10, 11, 14, 13, 12, 15, 8, 4, 7, 6];
//$a = array_reverse(range(1, 15));
echo implode(', ', $a)."\n";
$start_time = microtime(1);
$len = $count = count($a);
$tail = $count - 1;
while ($count) {
    for ($i = $count; $tail > 0; $i--) {
        $left = $a[$tail-1];
        $right = $a[$tail];
        if ($left > $right) {
            $a[$tail-1] = $right;
            $a[$tail] = $left;
        }
        --$tail;
    }
    --$count;
    $tail = $len - 1;
}

$time_consumed = microtime(1) - $start_time;
echo "TIME CONSUMED: " . $time_consumed . "s\n";

echo implode(', ', $a)."\n";
