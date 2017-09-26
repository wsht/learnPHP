<?php
/**
 * Created by PhpStorm.
 * User: hantong
 * Date: 17/9/15
 * Time: 下午3:33
 */

$client = new swoole_client(SWOOLE_SOCK_TCP| SWOOLE_KEEP);



	if(!$client->connect("0.0.0.0", 10086, -1))
	{
		echo("connect failed\n");
	}

	if($client->send("hello world\n"))
	{
		echo("send failed\n");
	}

	while(true)
	{
		$data = $client->recv();
		var_dump($data);

		sleep(1);
	}

$client->close();
