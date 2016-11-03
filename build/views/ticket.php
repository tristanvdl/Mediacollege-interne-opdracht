<?php
$pushData = new Ticket($con);
$keys = $pushData->PushTicketData();
if (!isset($_SESSION['user'])) {
    echo "<div class='loginwarning'>Log in om een melding te maken</div>";
} else {
    ?>
    <div class="container ticket-content">
        <div class="ticket-child">
            <h4 class="title-ticket">Melding indienen</h4>
            <form name="myform" action="?page=ticket" method="post">
                <input type="text" name="onderwerp" value="<?php echo $_GET['dienst']; ?>" placeholder="onderwerp"><br>
                <textarea name="beschrijving" id="" placeholder="beschrijving" cols="30" rows="10"></textarea><br>
                <select name="locatie" placeholder="locatie"><br>
                    <option value="contactweg">Contactweg</option>
                    <option value="dintelstraat">Dintelstraat</option>
                </select><br>
                <input type="text" name="specifieke_locatie" placeholder="Specifieke locatie"><br>
                <select name="spoed" placeholder="spoed"><br>
                    <option value="0" class="spoedoption">Direct</option>
                    <option value="1" class="spoedoption">Vandaag</option>
                    <option value="2" class="spoedoption">Binnen een week</option>
                    <option value="3" class="spoedoption">Geen spoed</option>
                </select><br>
                <input type="hidden" name="dienst" value="">
                <button form="cmsform" type="button" onclick="myform.submit()"
                        class="aanvraagbutton btn btn-default actionbutton">Vraag aan
                </button>
            </form>
        </div>
    </div>
    <?php
}
