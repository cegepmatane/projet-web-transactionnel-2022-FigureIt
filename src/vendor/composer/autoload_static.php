<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0f4eb0224f7e8ad8bd165b03e424921d
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0f4eb0224f7e8ad8bd165b03e424921d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0f4eb0224f7e8ad8bd165b03e424921d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0f4eb0224f7e8ad8bd165b03e424921d::$classMap;

        }, null, ClassLoader::class);
    }
}
