<?php

/**
 * Created by IntelliJ IDEA.
 * User: trist
 * Date: 12-10-2016
 * Time: 09:52
 */
class ProcedureSearch
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function SearchItems($table,$value)
    {
        $key = $_GET[$value];
        $statement = $this->db->prepare("SELECT id,dienst FROM $table WHERE dienst LIKE '%{$key}%' LIMIT 5");
        $statement->execute();
        $output = "";
        while($result = $statement->fetchAll(PDO::FETCH_ASSOC)){
            for ($i = 0; $i < count($result); $i++ )
                $output .= '<a href="?page=result&result='.$result[$i]['id'].'">'.$result[$i]['dienst'].'</a><br>';
        }
        return $output;
    }

    public function SingleItem($table)
    {
        $key = $_GET['result'];
        $statement = $this->db->prepare("SELECT * FROM $table WHERE id LIKE '$key'");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}