<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite611dc8f1df3fdfd9b86585cdfccbd35
{
    public static $files = array (
        '3917c79c5052b270641b5a200963dbc2' => __DIR__ . '/..' . '/kint-php/kint/init.php',
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
        'K' => 
        array (
            'Kint\\' => 5,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
        'D' => 
        array (
            'Delight\\Http\\' => 13,
            'Delight\\Db\\' => 11,
            'Delight\\Cookie\\' => 15,
            'Delight\\Base64\\' => 15,
            'Delight\\Auth\\' => 13,
        ),
        'A' => 
        array (
            'Aura\\SqlQuery\\' => 14,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'Kint\\' => 
        array (
            0 => __DIR__ . '/..' . '/kint-php/kint/src',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'Delight\\Http\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/http/src',
        ),
        'Delight\\Db\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/db/src',
        ),
        'Delight\\Cookie\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/cookie/src',
        ),
        'Delight\\Base64\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/base64/src',
        ),
        'Delight\\Auth\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/auth/src',
        ),
        'Aura\\SqlQuery\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/sqlquery/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite611dc8f1df3fdfd9b86585cdfccbd35::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite611dc8f1df3fdfd9b86585cdfccbd35::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
