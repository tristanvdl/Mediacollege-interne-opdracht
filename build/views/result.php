<?php
$singleItem = new Procedure($con);
$item = $singleItem->SingleProcedure('procedures', 'result', 'id', $_GET);

?>
<div class="container result-content">
    <div class="wrapper_results resultcontentchild">
        <div class="row">
            <div class="col-md-12 pagetitle restitle">
                <h1><?php echo $item['dienst'];
                    if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 1) {
                    ?>
                    <a class="btn btn-primary actionbutton updatebutton"
                       href="?page=admin_cms&ticket_id=<?php echo $_GET['result']; ?>">Bewerken</a></h1>
                <?php
                }
                ?>
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

            <a class="btn btn-default actionbutton updatebutton"
               href="?page=ticket&dienst=<?php echo $item['dienst'] ?>">Probleem Melden</a>
        </div>
    </div>
</div>
