<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6518b1c493198fe6831903c87e9d9a91
{
    public static $prefixLengthsPsr4 = array (
        'f' => 
        array (
            'factcli\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'factcli\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6518b1c493198fe6831903c87e9d9a91::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6518b1c493198fe6831903c87e9d9a91::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit6518b1c493198fe6831903c87e9d9a91::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
