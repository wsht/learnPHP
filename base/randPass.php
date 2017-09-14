<?php


//php生成随机密码的4种方法以及性能比较

//方法一：在33-126生成一个随机整数，将随机整数转换成ASCII 编码，重复以上步骤n次，连接成n位密码

//

function create_pass_1($pw_length = 8)
{
    $randpwd = '';
    for($i = 0; $i < $pw_length; $i++)
    {   
        //chr 将对应整数转换成对应字符，mt_rand用于生成随机整数
        $randpwd .= chr(mt_rand(48,57));   
    }
    
    return $randpwd;
}

//方法二：1.预置一个字符串$chars 包括a-z,A-Z,0-9;2.在$char字符串中随机取一个字符;3.重复n次，连接成n位密码
function create_pass_2($pw_length = 8)
{   
    // 密码字符集，可以任意添加你需要的字符
    $char = 
        "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $randpwd = '';
    $max = strlen($char) - 1;
    for($i = 0; $i < $pw_length; $i++)
    {
        //这里提供两种字符串获取方式
        //第一种是使用substr截取$char中任意一位字符
        //第二种是取字符串数组char的任意元素
        //$randpwd .= substr($char, $max, 1);

        $randpwd .= $char[ mt_rand(0,$max) ];
    }
    
    return $randpwd;
}


//方法三： 1.预置一个字符串数组，a-z,A-Z,0-9;2.通过array_rand()从数组$char中随机选出$length个元素
//3.根据已经获取的键名数组$key从数组char取出拼接字符串。该方法的缺点是相同的字符不会重复取
function create_pass_3($pw_length = 8)
{
    // 密码字符集，可任意添加你需要的字符
    $char = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
    'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's',
    't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D',
    'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O',
    'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z',
    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    
    //在char中随机取$length 个数元素键名

    $key = array_rand($char, $pw_length);

    $randpwd = '';
    for($i = 0; $i < $pw_length; $i++)
    {
        $randpwd .= $char[$key[$i]];
    }

    return $randpwd;
}


//方法四 因md5关系，生成密码只包括字母和数字而且长度有限制，最长不过32
//1.time（）获取当前unix时间戳
//2.将获取时间加密
//3.将加密结果截取n位取得想要的密码

function create_pass_4($pw_length = 8)
{
    $str = substr(md5(time()),0,$pw_length);
    return $str;

}



function test($func = 'create_pass_1', $pw_length = 8)
{
    $st = microtime(true);
    echo $func($pw_length) . "\n";
    $et = microtime(true);
    $t = $et - $st;
    echo $func . "run " . $pw_length . "cost time :" . $t . "\n";
}

test('create_pass_1', 32);
test('create_pass_2', 32);
test('create_pass_3', 32);
test('create_pass_4', 32);

