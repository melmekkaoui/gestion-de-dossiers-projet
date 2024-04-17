<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitca0995107f4ca43e19b46fc96e0710d9
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\Config' => __DIR__ . '/../..' . '/app/Config.php',
        'App\\SQLiteConnection' => __DIR__ . '/../..' . '/app/SQLiteConnection.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitca0995107f4ca43e19b46fc96e0710d9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitca0995107f4ca43e19b46fc96e0710d9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitca0995107f4ca43e19b46fc96e0710d9::$classMap;

        }, null, ClassLoader::class);
    }
}
