<?php

class Procedure
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function SearchProcedure($table,$value)
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

    public function SingleProcedure($table,$value,$row,$method)
    {
        $key = $method[$value];
        $statement = $this->db->prepare("SELECT * FROM $table WHERE $row LIKE '$key'");
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }

    public function UpdateProcedure()
    {
        $key = array(
            isset($_POST['titel']) ? $_POST['titel'] : '',
            isset($_POST['omschrijving']) ? $_POST['omschrijving'] : '',
            isset($_POST['aanvragen']) ? $_POST['aanvragen'] : '',
            isset($_POST['levertijd']) ? $_POST['levertijd'] : '',
        );
        $id = $_GET['ticket_id'];
        $statement = $this->db->prepare("UPDATE procedures SET dienst='$key[0]', omschrijving='$key[1]', aanvragen='$key[2]', levertijd='$key[3]' WHERE id='$id'");
        $result = $statement->execute();
        return $result;
    }

    public function addNewProcedure()
    {
        $keys = array(
            isset($_POST['titel_new']) ? $_POST['titel_new'] : '',
            isset($_POST['omschrijving_new']) ? $_POST['omschrijving_new'] : '',
            isset($_POST['aanvragen_new']) ? $_POST['aanvragen_new'] : '',
            isset($_POST['levertijd_new']) ? $_POST['levertijd_new'] : ''
        );
        $statement = $this->db->prepare("INSERT INTO procedures(dienst,omschrijving,aanvragen,levertijd) VALUES (:title,:description,:aanvragen,:levertijd)");
        $statement->bindParam(":title",$keys[0],PDO::PARAM_STR);
        $statement->bindParam(":description",$keys[1],PDO::PARAM_STR);
        $statement->bindParam(":aanvragen",$keys[2],PDO::PARAM_STR);
        $statement->bindParam(":levertijd",$keys[3],PDO::PARAM_STR);
        
        return  $statement->execute() ? true : false;
    }
}