<?php 

$serv = new swoole_server('0.0.0.0', 10086);

$serv->on("connect", function($serv,$fd){
	echo "Client::connect\n";
});


$serv->on("receive", function($serv, $fd, $from_id, $data){
	var_dump($data);
	$serv->send($fd,$data);
});

$serv->on("close", function($serv, $fd){
	echo "client :close\n";
});


$serv->start();
