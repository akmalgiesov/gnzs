<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd3524d73d76d40ab192f0db3d7cfb05a
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd3524d73d76d40ab192f0db3d7cfb05a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd3524d73d76d40ab192f0db3d7cfb05a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd3524d73d76d40ab192f0db3d7cfb05a::$classMap;

        }, null, ClassLoader::class);
    }
}
