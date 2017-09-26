<?php
/**
 * Created by PhpStorm.
 * User: hantong
 * Date: 17/9/15
 * Time: 下午4:13
 */

class workerThread extends Thread
{
	public function __construct($i)
	{
		$this->i = $i;
	}

	public function run()
	{
		while (true)
		{
			echo $this->i;
			sleep(1);
		}
	}
}

for($i=0;$i< 50;$i++)
{
	$worker[$i] = new workerThread($i);
	$worker[$i]->start();
}