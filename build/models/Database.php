<?php

class Database
{
    private $db;
    private $error;
    private static $_instance = null;

    //connection to DB with PDO
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

    //Method to pass the DB to other classes
    public function getDB()
    {
        return $this->db;
    }

    //Singleton connection (makes sure there is only one database connection at a time)
    public static function getInstance()
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }
}