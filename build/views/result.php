<?php

$db = new Database();
$item = $db->SingleItem('procedures');
$_keys = $db->PushTicketData();
foreach ($item as $key) {
    ?>

    <div class="container resultcontent">
        <div class="wrapper_results resultcontentchild">
            <div class="row">
                <h1 class="pagetitle restitle"><?php echo $key['dienst'] ?></h1>

                <div class="omschrijving col-md-5">
                    <h2 class="columntitle">Omschrijving</h2>
                    <?php echo $key['omschrijving'] ?>
                </div>

                <div class="col-md-2"></div>

                <div class="aanvragen col-md-5">
                    <h2 class="columntitle">Aanvragen</h2>
                    <?php echo $key['aanvragen'] ?>
                </div>
            </div>
            <div class="row">
                <div class="levertijd col-md-5">
                    <h2 class="columntitle">Levertijd</h2>
                    <?php echo $key['levertijd'] ?>
                </div>

                <div class="col-md-2"></div>

                <div class="link col-md-5">
                    <h2 class="columntitle">Link</h2>
                    <?php echo $key['link'] ?>
                </div>
            </div>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
        </div>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Maak een ticket aan</h4>
                    </div>
                    <div class="modal-body">
                        <form action="?page=result&result=<?php echo $_GET['result']; ?>" method="post">
                            onderwerp
                            <input type="text" name="onderwerp"><br>
                            beschrijving
                            <input type="text" name="beschrijving"><br>
                            Locatie
                            <select name="locatie"><br>
                                <option value="contactweg">Contactweg</option>
                                <option value="dintelstraat">Dintelstraat</option>
                            </select><br>
                            Specifieke locatie
                            <input type="text" name="specifieke_locatie"><br>
                            spoed
                            <select name="spoed"><br>
                                <option value="0">Direct</option>
                                <option value="1">Vandaag</option>
                                <option value="2">Binnen een week</option>
                                <option value="3">Geen spoed</option>
                            </select><br>
                            <input type="hidden" name="dienst" value="<?php echo $key['dienst'] ?>">
                            <input type="submit">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
<!-- Modal -->

