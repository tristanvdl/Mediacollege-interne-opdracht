<?php

/**
 * Created by IntelliJ IDEA.
 * User: trist
 * Date: 30-9-2016
 * Time: 09:39
 */

class Database
{
    private $db_host;
    private $db_password;
    private $db_name;
    private $db_user;
    private $db;

    public function __construct($host, $password, $name, $user)
    {
        $this->db_host = $host;
        $this->db_name = $name;
        $this->db_password = $password;
        $this->db_user = $user;
        try
        {
            $this->db = new PDO('mysql:host=' . $host . ';dbname=' . $name . '', $user, $password);
        }
        catch(PDOException $e)
        {
            $this->error = $e->getMessage();
        }
        return $this->db;
    }

    public function getAll($table)
    {
        $statement = $this->db->prepare("select * from $table");
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
}