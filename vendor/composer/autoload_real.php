<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit5a3bf1dd52fdaa2dc0f7f7b74bb20ddf
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit5a3bf1dd52fdaa2dc0f7f7b74bb20ddf', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit5a3bf1dd52fdaa2dc0f7f7b74bb20ddf', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit5a3bf1dd52fdaa2dc0f7f7b74bb20ddf::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}