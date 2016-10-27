<?php
$singleItem = new Procedure($con);
$item = $singleItem->SingleProcedure('procedures','result','id',$_GET);

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
                    <a href="?page=ticket&dienst=<?php echo $item['dienst'] ?>"><span class="result-button" data-toggle="modal" data-target="#myModal"><p>Ticket Aanvragen</p><i class="fa fa-2x fa-long-arrow-right result-arrow" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
    </div>
