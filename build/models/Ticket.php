<?php

class Ticket
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    //Pushes ticket into database
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
        :onderwerp,
        :beschrijving,
        :locatie,
        :specifieke_locatie,
        :spoed,
        '',
        '',
        'Henkie Henk',
        :dienst)
        ");
        $statement->bindParam(":onderwerp",$keys[0],PDO::PARAM_STR);
        $statement->bindParam(":beschrijving",$keys[1],PDO::PARAM_STR);
        $statement->bindParam(":locatie",$keys[2],PDO::PARAM_STR);
        $statement->bindParam(":specifieke_locatie",$keys[3],PDO::PARAM_STR);
        $statement->bindParam(":spoed",$keys[4],PDO::PARAM_STR);
        $statement->bindParam(":dienst",$keys[5],PDO::PARAM_STR);
        return  $statement->execute() ? true : false;
    }
}