<?php

namespace Arf;

class Autoload {

    public static function arfAutoloader( $class ): void
    {
        $classPath = str_replace('\\', '/', $class);

        $file = dirname(__DIR__) . '/' . $classPath . '.php';

        if (file_exists($file)) {
            require $file;
        } else {
            echo "Class not found: " . $file;
        }
    }

    public static function register(): void
    {
        spl_autoload_register([self::class, 'arfAutoloader']);
    }
}

