<?php
if (isset($_SESSION['user'])) {
    $ticket = new Ticket($con);
    $personal_tickets = $ticket->getUserPersonalTickets();

    ?>
    <div class="container-fluid usercontent">
        <h1>Mijn tickets</h1>
        <div style="overflow-x:auto;">

        <table class="tickettable">

            <tr class="toprow">

                <td class="number"> </td>
                <td><div class="whitespace"> </div>Procedure</td>
                <td>Beschrijving</td>
                <td>Locatie</td>
                <td>Specifieke Locatie</td>
                <td>Spoed</td>
                <td>Tijd aangemaakt</td>
                <td>Ticket progress</td>
            </tr>
            <?php
            $count = 1;
            foreach ($personal_tickets as $value) { ?>
                <tr>

                    <td class="number"><?php echo $count; ?></td>
                    <td><div class="whitespace"> </div><?php echo $value['onderwerp'] ?></td>
                    <td><?php echo $value['beschrijving'] ?></td>
                    <td><?php echo $value['locatie'] ?></td>
                    <td><?php echo $value['specifieke_locatie'] ?></td>
                    <td><?php echo $value['spoed'] ?></td>
                    <td><?php echo $value['time_stamp'] ?></td>
                    <td><?php echo $value['progress'] ?></td>
                </tr>
            <?php $count++; } ?>
        </table>

        </div>
    </div>
    <?php
} else {
    echo "dacht het niet he";
} ?>
