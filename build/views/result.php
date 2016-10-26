<?php
$singleItem = new Procedure($con);
$pushData = new Ticket($con);
$item = $singleItem->SingleProcedure('procedures','result','id',$_GET);
$keys = $pushData->PushTicketData();

    ?>
    <div class="container result-content">
        <div class="wrapper_results resultcontentchild">
            <div class="row">
                <div class="col-md-12 pagetitle restitle">
                    <h1><?php echo $item['dienst'] ?><a href="?page=admin_cms&ticket_id=<?php echo $_GET['result']; ?>"><span><p>Bewerken</p></span></a></h1>
                </div>
                <div class="omschrijving col-md-5">
                    <h2 class="columntitle">Omschrijving</h2>
                    <?php echo $item['omschrijving'] ?>
                </div>

                <div class="col-md-2"></div>

                <div class="aanvragen col-md-5">
                    <h2 class="columntitle">Aanvragen</h2>
                    <?php echo $item['aanvragen'] ?>
                </div>
            </div>
            <div class="row">
                <div class="levertijd col-md-5">
                    <h2 class="columntitle">Levertijd</h2>
                    <?php echo $item['levertijd'] ?>
                </div>

                <div class="col-md-2"></div>

                <div class="button_aanvragen col-md-5">
                    <span class="result-button" data-toggle="modal" data-target="#myModal"><p>Ticket Aanvragen</p><i class="fa fa-2x fa-long-arrow-right result-arrow" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
        <!-- create ticket starts here -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <h4 class="modal-title">Melding indienen</h4>
                    <form action="?page=result&result=<?php echo $_GET['result']; ?>" method="post">
                        <input type="text" name="onderwerp" placeholder="onderwerp"><br>
                        <input type="text" name="beschrijving" placeholder="beschrijving"><br>
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
                        <input type="hidden" name="dienst" value="<?php echo $item['dienst'] ?>">
                        <div class="button_aanvragen col-md-5">
                            <span class="result-button createticket"><p>Vraag aan</p><i class="fa fa-2x fa-long-arrow-right result-arrow" aria-hidden="true"></i></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
