<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitabc88cccbbeee129e217dc1c199e9b26
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

        spl_autoload_register(array('ComposerAutoloaderInitabc88cccbbeee129e217dc1c199e9b26', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitabc88cccbbeee129e217dc1c199e9b26', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitabc88cccbbeee129e217dc1c199e9b26::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
