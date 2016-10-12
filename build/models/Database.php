<?php

/**
 * Created by IntelliJ IDEA.
 * User: trist
 * Date: 30-9-2016
 * Time: 09:39
 */

class Database
{
    private $db;
    private $error;
    private static $_instance = null;

    public function __construct()
    {
        try
        {
            $this->db = new PDO('mysql:host=localhost;dbname=procedures_ma', 'root', '');
        }
        catch(PDOException $e)
        {
            $this->error = die($e->getMessage());
        }
    }

    public function getDB()
    {
        return $this->db;
    }

    public static function getInstance()
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }
}