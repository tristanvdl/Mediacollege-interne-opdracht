<?php
if ($_SESSION['user']) {
    $ticket = new Ticket($con);
    $personal_tickets = $ticket->getUserPersonalTickets();
    foreach ($personal_tickets as $value) {
        echo $value['beschrijving'];
    }
} else {
    echo "dacht het niet he";
}


?>


