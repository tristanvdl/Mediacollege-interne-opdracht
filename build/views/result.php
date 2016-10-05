<?php

$db = new Database();
$item = $db->SingleItem('procedures');
foreach ($item as $key) {
    ?>
    <h1 class="pagetitle restitle"><?php echo $key['dienst']?></h1>
    <?php echo $key['omschrijving'] ?>
    <?php echo $key['aanvragen'] ?>
    <?php echo $key['link'] ?>
    <?php echo $key['levertijd'] ?>
    <?php
}
?>
