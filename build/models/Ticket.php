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
            isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '',
            isset($_SESSION['user']) ? $_SESSION['user'] : '',
            "Aangemaakt",
            'N.o.t.k.'
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
        user_id)
        VALUES(
        :onderwerp,
        :beschrijving,
        :locatie,
        :specifieke_locatie,
        :spoed,
        :progress,
        :betrokken_werknemer,
        :instuurder,
        :user_id)
        ");
        $statement->bindParam(":onderwerp", $keys[0], PDO::PARAM_STR);
        $statement->bindParam(":beschrijving", $keys[1], PDO::PARAM_STR);
        $statement->bindParam(":locatie", $keys[2], PDO::PARAM_STR);
        $statement->bindParam(":specifieke_locatie", $keys[3], PDO::PARAM_STR);
        $statement->bindParam(":spoed", $keys[4], PDO::PARAM_STR);
        $statement->bindParam(":user_id", $keys[5], PDO::PARAM_STR);
        $statement->bindParam(":instuurder", $keys[6], PDO::PARAM_STR);
        $statement->bindParam(":progress",$keys[7], PDO::PARAM_STR);
        $statement->bindParam(":betrokken_werknemer",$keys[8], PDO::PARAM_STR);
        return $statement->execute() ? true : false;
    }

    public function getUserPersonalTickets()
    {
        $value = $_SESSION['user_id'];
        $statement = $this->db->prepare("
        SELECT 
        tickets.onderwerp,
        tickets.beschrijving,
        tickets.locatie,
        tickets.specifieke_locatie,
        tickets.spoed,
        tickets.time_stamp,
        tickets.progress
        FROM tickets
        LEFT JOIN users
        ON tickets.user_id=users.id
        WHERE tickets.user_id = :user_id
        ORDER BY time_stamp DESC");
        $statement->bindParam(":user_id", $value, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllTickets()
    {
        $statement = $this->db->prepare("SELECT * FROM tickets");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}