<?php
//Autoloads all classes
class Autoload
{

    static function register()
    {
        spl_autoload_register(array(__CLASS__,'__autoload'));
    }

    static function __autoload($class_name)
    {
        require 'models/' . $class_name . '.php';
    }

}