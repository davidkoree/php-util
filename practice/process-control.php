<?php
declare(ticks=1);

set_time_limit(0);
date_default_timezone_set('Asia/Chongqing');

$targetFile = $argv[1]; //目标文件
$numberOfChildProcess = $argv[2]; //子进程数

$starttime = microtime(TRUE);
pcntl_signal(SIGCHLD, 'signal_handler');

function signal_handler($signal) {
	global $pid_arr;
	global $starttime;
	switch($signal) {
		case SIGCHLD:
			while (($child_pid = pcntl_waitpid(0, $status)) != -1) {
				if (pcntl_wifexited($status)) {
					$i = $pid_arr[$child_pid];
					$time_consumed = microtime(TRUE) - $starttime;
					echo "Child $child_pid with status $status and queue No.$i completed, time consumed $time_consumed secs\n";
					unset($pid_arr[$child_pid]);
				}
			}
	}
}

function performSomeFunction($i, $start_offset, $end_offset, $call_func = '') {

	$file = $GLOBALS['targetFile'];
	$fh = fopen($file, 'r');
	$j = 0;

	while ($line = trim(fgets($fh))) {
		$j++; // line always start at 1
		if ($j < $start_offset) {
			continue;
		} elseif ($j >= $start_offset && $j <= $end_offset) {
			//DO STH HERE
		} else {
			fclose($fh);
			break;
		}
	}

}

/* 根据设置的单进程处理上限，计算出需要多少个子进程来处理大文件 */
exec("wc -l $targetFile", $output, $return_var);
if (0 !== $return_var) exit("fail to execute wc command");
$lines_count = intval(trim($output[0]));
$lines_per_process = intval($lines_count/$GLOBALS['numberOfChildProcess']);//设置n个子进程
$child_process_count = ceil($lines_count/$lines_per_process);
echo "script:" . __FIIE__ . " total lines:$lines_count lines per process:$lines_per_process childs:$child_process_count\n";


/* 开始分派子进程 */
$i = 0;
$pid_arr = array();
while ($i < $child_process_count)
{
	$pid = pcntl_fork();
	if ($pid == -1)
	{
		die('could not fork');
	}
	else
	{
		if ($pid) // 在父进程里，记录子进程ID
		{
			$pid_arr[$pid] = $i;
		}
		else // 在子进程里，分派任务，传入进程编号、文件处理的起始行号和结束行号
		{
			$start_offset = $i * $lines_per_process + 1;
			$end_offset   = ($i + 1) * $lines_per_process;
			performSomeFunction($i, $start_offset, $end_offset);
			exit(0);
		}
	}
	$i++;
}

/* 当所有子进程结束后，父进程脚本才结束 */
while (count($pid_arr) > 0) { }
