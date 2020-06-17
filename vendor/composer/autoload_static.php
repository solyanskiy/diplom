<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit684d67201461696406ecd6626c25bea0
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Engine\\DI\\' => 10,
            'Engine\\' => 7,
        ),
        'C' => 
        array (
            'Cms\\' => 4,
        ),
        'A' => 
        array (
            'Admin\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Engine\\DI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/engine/DI',
        ),
        'Engine\\' => 
        array (
            0 => __DIR__ . '/../..' . '/engine',
        ),
        'Cms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/cms',
        ),
        'Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/admin',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit684d67201461696406ecd6626c25bea0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit684d67201461696406ecd6626c25bea0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
