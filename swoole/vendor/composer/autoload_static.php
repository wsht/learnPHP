<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit244ee742958f3c68f850bbd1c79a7891
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Swoole\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Swoole\\' => 
        array (
            0 => __DIR__ . '/..' . '/eaglewu/swoole-ide-helper/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit244ee742958f3c68f850bbd1c79a7891::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit244ee742958f3c68f850bbd1c79a7891::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
