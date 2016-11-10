<?php

if (isset($_SESSION['user']) && $_SESSION['user_level'] == 0) {
    $ticket_service = new Ticket($con);
    $result = $ticket_service->getAllTickets();
    ?>
    <div class="container-fluid">
        <form action="?page=ticket_overzicht" method="POST">
            <table class="table table-bordered">
                <tr>
                    <th>Procedure</th>
                    <th>Beschrijving</th>
                    <th>Instuurder</th>
                    <th>Locatie</th>
                    <th>Specifieke Locatie</th>
                    <th>Spoed</th>
                    <th>Tijd aangemaakt</th>
                    <th>Tijd afgehandeld</th>
                    <th>Betrokken werknemer</th>
                    <th>Ticket progress</th>
                </tr>
                <?php foreach ($result as $value) { ?>
                    <tr>
                        <td><?php echo $value['onderwerp'] ?></td>
                        <td><?php echo $value['beschrijving'] ?></td>
                        <td><?php echo $value['instuurder'] ?></td>
                        <td><?php echo $value['locatie'] ?></td>
                        <td><?php echo $value['specifieke_locatie'] ?></td>
                        <td><?php echo $value['spoed'] ?></td>
                        <td><?php echo $value['time_stamp'] ?></td>
                        <td><?php echo $value['tijd_afgehandeld'] ?></td>
                        <td>

                            <?php if ($_GET['action'] == "edit") { ?>
                                <input type="text" name="betrokken_werknemer" value="">
                            <?php } else { ?>
                                <?php echo $value['betrokken_werknemer'];
                            } ?>
                        </td>
                        <td>

                            <?php if ($_GET['action'] == "edit") { ?>
                                <select>
                                    <option value="Aangemaakt">Aangemaakt</option>
                                    <option value="In behandeling">In behandeling</option>
                                    <option value="Afgehandeld">Afgehandeld</option>
                                </select>
                            <?php } else { ?>
                                <?php echo $value['progress'];
                            } ?>
                        </td>
                        <td>
                            <a href="?page=ticket_overzicht&action=edit">Bewerken</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </form>
    </div>
    <?php
} else {
    echo "dacht het niet he";
} ?>
