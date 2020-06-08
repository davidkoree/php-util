<?php
//SELECTION_SORT
$a = [5, 9, 3, 1, 2, 10, 11, 14, 13, 12, 15, 8, 4, 7, 6];
//$a = array_reverse(range(1, 15));
echo implode(', ', $a)."\n";
$start_time = microtime(1);
$len = count($a);
for ($i = 0; $i < $len; $i++) {
    $j = $i + 1;
    while ($j < $len) {
        if ($a[$j] < $a[$i]) {
            $smaller = $a[$j];
            $larger = $a[$i];
            $a[$i] = $smaller;
            $a[$j] = $larger;
        }
        ++$j;
    }
}

$time_consumed = microtime(1) - $start_time;
echo "TIME CONSUMED: " . $time_consumed . "s\n";

echo implode(', ', $a)."\n";
