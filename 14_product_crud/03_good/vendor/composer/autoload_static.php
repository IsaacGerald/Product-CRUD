<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9c49ea93d6290be92c13225e85221881
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9c49ea93d6290be92c13225e85221881::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9c49ea93d6290be92c13225e85221881::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9c49ea93d6290be92c13225e85221881::$classMap;

        }, null, ClassLoader::class);
    }
}
