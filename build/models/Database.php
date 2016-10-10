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
        $statement = $this->db->prepare("SELECT id,dienst FROM $table WHERE dienst LIKE '%{$key}%' LIMIT 5");
        $statement->execute();
        while($result = $statement->fetchAll(PDO::FETCH_ASSOC)){
            for ($i = 0; $i < count($result); $i++ )
            echo '<a href="?page=result&result='.$result[$i]['id'].'">'.$result[$i]['dienst'].'</a><br>';
        }
    }

    public function SingleItem($table)
    {
        $key = $_GET['result'];
        $statement = $this->db->prepare("SELECT * FROM $table WHERE id LIKE '$key'");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function PushTicketData()
    {
        $keys = array(
            isset($_POST['onderwerp']) ? $_POST['onderwerp'] : '',
            isset($_POST['beschrijving']) ? $_POST['beschrijving'] : '',
            isset($_POST['locatie']) ? $_POST['locatie'] : '',
            isset($_POST['specifieke_locatie']) ? $_POST['specifieke_locatie'] : '',
            isset($_POST['spoed']) ? $_POST['spoed'] : '',
            isset($_POST['dienst']) ? $_POST['dienst'] : ''
        );

        $statement = $this->db->prepare("
        INSERT
        INTO tickets(
        onderwerp,
        beschrijving,
        locatie,
        specifieke_locatie,
        spoed,
        progress,
        betrokken_werknemer,
        instuurder,
        proceduren)
        VALUES(
        '$keys[0]',
        '$keys[1]',
        '$keys[2]',
        '$keys[3]',
        $keys[4],
        '',
        '',
        'Henkie Henk',
        '$keys[5]')
        ");
        
        $result = $statement->execute();
        return $result;
    }
}