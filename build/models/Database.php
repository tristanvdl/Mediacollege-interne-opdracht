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

    public function SearchJSONEnc($table,$value)
    {
        $key = $_GET[$value];
        $statement = $this->db->prepare("select dienst from $table WHERE dienst LIKE '%{$key}%' ");
        $statement->execute();
        while($result = $statement->fetchAll(PDO::FETCH_ASSOC)){
            for ($i = 0; $i < count($result); $i++ )
            echo '<a href="#">'.$result[$i]['dienst'].'</a><br>';
        }
    }
}