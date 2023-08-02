<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5a3bf1dd52fdaa2dc0f7f7b74bb20ddf
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mojahed\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mojahed\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5a3bf1dd52fdaa2dc0f7f7b74bb20ddf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5a3bf1dd52fdaa2dc0f7f7b74bb20ddf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5a3bf1dd52fdaa2dc0f7f7b74bb20ddf::$classMap;

        }, null, ClassLoader::class);
    }
}
