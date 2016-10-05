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

    public function SearchItems($table,$value)
    {
        $key = $_GET[$value];
        $statement = $this->db->prepare("SELECT dienst FROM $table WHERE dienst LIKE '%{$key}%' LIMIT 10");
        $statement->execute();
        while($result = $statement->fetchAll(PDO::FETCH_ASSOC)){
            for ($i = 0; $i < count($result); $i++ )
            echo '<a href="?page=result&result='.$result[$i]['dienst'].'">'.$result[$i]['dienst'].'</a><br>';
        }
    }

    public function SingleItem($table)
    {
        $key = $_GET['result'];
        $statement = $this->db->prepare("SELECT * FROM $table WHERE dienst LIKE '$key'");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}