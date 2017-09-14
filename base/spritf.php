<?php
$length = 6;
echo sprintf('%0'.$length.'b', mt_rand(0, pow(10, $length)-1) );
echo"\n";
echo sprintf( '%0'.'7'.'d',mt_rand(0, pow(10,$length)-1));
