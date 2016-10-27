<?php
$pushData = new Ticket($con);
$keys = $pushData->PushTicketData();

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
            <div class="button_aanvragen">
                <span class="result-button createticket" onclick="myform.submit()"><p>Vraag aan</p><i class="fa fa-2x fa-long-arrow-right result-arrow" aria-hidden="true"></i></span>
            </div>
        </form>
    </div>
</div>