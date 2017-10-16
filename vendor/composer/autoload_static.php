<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7023256030df7056c3342a7ee2987c0b
{
    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'wechat\\' => 7,
        ),
        'A' => 
        array (
            'Addons\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'wechat\\' => 
        array (
            0 => __DIR__ . '/..' . '/houdunwang/wechat/src',
        ),
        'Addons\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Addons',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7023256030df7056c3342a7ee2987c0b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7023256030df7056c3342a7ee2987c0b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}