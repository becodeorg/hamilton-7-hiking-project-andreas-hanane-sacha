<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9b91e44ec964cad8a8d8419b7fe02be5
{
    public static $classMap = array (
        'AuthController' => __DIR__ . '/../..' . '/controllers/AuthController.php',
        'AuthModel' => __DIR__ . '/../..' . '/models/AuthModel.php',
        'ComposerAutoloaderInit9b91e44ec964cad8a8d8419b7fe02be5' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit9b91e44ec964cad8a8d8419b7fe02be5' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'ErrorController' => __DIR__ . '/../..' . '/controllers/ErrorController.php',
        'HikeController' => __DIR__ . '/../..' . '/controllers/HikeController.php',
        'HikeModel' => __DIR__ . '/../..' . '/models/HikeModel.php',
        'HomeController' => __DIR__ . '/../..' . '/controllers/HomeController.php',
        'Model' => __DIR__ . '/../..' . '/models/Model.php',
        'RouterController' => __DIR__ . '/../..' . '/controllers/RouterController.php',
        'TagsController' => __DIR__ . '/../..' . '/controllers/TagsController.php',
        'TagsModel' => __DIR__ . '/../..' . '/models/TagsModel.php',
        'UserController' => __DIR__ . '/../..' . '/controllers/UserController.php',
        'UserModel' => __DIR__ . '/../..' . '/models/UserModel.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit9b91e44ec964cad8a8d8419b7fe02be5::$classMap;

        }, null, ClassLoader::class);
    }
}
