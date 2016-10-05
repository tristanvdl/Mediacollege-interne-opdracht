<?php

$db = new Database();
$item = $db->SingleItem('procedures');
foreach ($item as $key) {
    ?>
    <div class="container resultcontent">
        <div class="wrapper_results resultcontentchild">
            <div class="row">
                <h1 class="pagetitle restitle"><?php echo $key['dienst']?></h1>

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
        </div>
    </div>
    <?php
}
?>
