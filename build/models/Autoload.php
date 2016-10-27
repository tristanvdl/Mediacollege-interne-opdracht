<?php

/**
 * Created by IntelliJ IDEA.
 * User: trist
 * Date: 3-10-2016
 * Time: 09:13
 */
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