<?php
namespace Autoloader;

class Autoloader
{
    public static function register($class_name)
    {
        spl_autoload_register(function ($class_name) {
            $file_path = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
            if (file_exists($file_path)) {
                include_once $file_path;
            } else {
                // Print error message for debugging
                echo "File not found: $file_path";
            }
        });
    }
}