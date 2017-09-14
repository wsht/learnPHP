<?php

$cmd = "php popen_run.php >> err.log 2>&1 &";

$hd = popen($cmd, 'r');

pclose($hd)	;