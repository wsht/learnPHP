<?php

for($i=0;$i<=5;$i++)
{

    $pid = pcntl_fork();

    if($pid == -1)
    {
        die( 'could not fork' );
    }
    else if($pid)
    {

        print "Fork: parent, letting thre child run amok...\n";
        //父进程会得到子进程的号，所以这里是父进程执行的逻辑
//        pcntl_waitpid(-1, $status, WNOHANG);
        pcntl_wait($status, WNOHANG);
    }
    else
    {
        //child thread get the pid is 0,so there is child thread process
        echo "Fork: child,letting the child run amok\n";
        exit(0);
    }

    echo "loop $i \n";
}
