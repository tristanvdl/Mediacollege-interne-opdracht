<?php

class Ticket
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
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