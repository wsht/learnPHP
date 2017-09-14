<?php
// declare(strict_types = 1);

// declare(ticks=1);
pcntl_signal(SIGCHLD, "garbage");

echo "parent start, pid ", getmypid(), "\n";

for($i=0; $i< 100; ++$i)
{
	$pid = pcntl_fork();
	if($pid == -1)
	{
		die("cannot fork");
	}
	elseif($pid > 0)
	{
		echo "parent continue \n";
		echo "parent fork pid => $pid\n";
		// for($k=0; $k < 2; ++$k)
		// {
			beep();
		// }
	}
	else
	{
		echo "child start, pid", getmypid(), "\n";
		// for($j=0; $j<5; ++$j)
		// {
		// 	beep();
		// }
		beep(true);
		exit(0);
	}
	pcntl_signal_dispatch();
}


while (true) {
	sleep(5);
}

function garbage ( $signal ){
	echo "signle $signal received\n";
	while(($pid = pcntl_waitpid(-1, $status, WNOHANG)) >0 )
	{
		echo "\t child end pid $pid , status $status\n";
	}
}

function beep($sleep = false)
{
	echo getmypid(), "\t", date("Y-m-d H:i:s", time()), "\n";
	// sleep(1);
	if($sleep)
	{
		sleep(rand(1,3));
	}
}