<?php
$singleItem = new Procedure($con);
$item = $singleItem->SingleProcedure('procedures','ticket_id', 'id',$_GET);
if (isset($_POST['titel_new'])){
    $singleItem->addNewProcedure();
    $item2 = $singleItem->SingleProcedure('procedures','titel_new', 'dienst',$_POST);
    echo("<script>window.location.assign(\"?page=result&result=". $item2['id'] ."\")</script>");
}
if (isset($_POST['titel'])){
    $update = $singleItem->UpdateProcedure();
    //header('Location: ?page=result&result='. $_GET['ticket_id'] .'');
    echo("<script>window.location.assign(\"?page=result&result=". $_GET['ticket_id'] ."\")</script>");
}
?>
<?php
    if ($_GET['ticket_id'] != "new" ){
?>
    <div class="container result-content">
        <div class="wrapper_results resultcontentchild">
            <form method="post" action="?page=admin_cms&ticket_id=<?php echo $_GET['ticket_id']; ?>">
                <div class="row">
                    <div class="col-md-12 pagetitle restitle">
                        <input name="titel" type="text" value="<?php echo $item['dienst'] ?>">
                    </div>
                    <div class="omschrijving col-md-5">
                        <h2 class="columntitle">Omschrijving</h2>
                        <textarea name="omschrijving" cols="30" rows="10"><?php echo $item['omschrijving']; ?></textarea>
                    </div>

                    <div class="col-md-2"></div>

                    <div class="aanvragen col-md-5">
                        <h2 class="columntitle">Aanvragen</h2>
                        <textarea name="aanvragen" cols="30" rows="10"><?php echo $item['aanvragen'] ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="levertijd col-md-5">
                        <h2 class="columntitle">Levertijd</h2>
                        <input name="levertijd" type="text" value="<?php echo $item['levertijd'] ?>">
                    </div>

                    <div class="col-md-2"></div>

                    <!-- <div class="button_aanvragen col-md-5">
                        <button>Update<i class="fa fa-2x fa-long-arrow-right" aria-hidden="true"></i></button>
                    </div> -->


                    <!-- action button -->
                    <button class="actionbutton updatebutton">
                        <div class="col-md-8 col-lg-8 col-sm-8">
                            <p>
                                <!-- <a href="#"> -->
                                    Update
                                <!-- </a> -->
                        </p>
                        </div>
                      <i class=" col-lg-4 col-md-4 col-sm-4 fa fa-2x fa-long-arrow-right" aria-hidden="true"></i>
                    </button>
                    <!-- end action button -->
                </div>
            </form>
        </div>
    <?php
    }else{
        ?>
        <div class="container result-content">
            <div class="wrapper_results resultcontentchild">
                <form method="post" action="?page=admin_cms&ticket_id=new">
                    <div class="row">
                        <div class="col-md-12 pagetitle restitle">
                            <input name="titel_new" type="text" value="Dienst">
                        </div>
                        <div class="omschrijving col-md-5">
                            <h2 class="columntitle">Omschrijving</h2>
                            <textarea name="omschrijving_new" cols="30" rows="10">Omschrijving</textarea>
                        </div>

                        <div class="col-md-2"></div>

                        <div class="aanvragen col-md-5">
                            <h2 class="columntitle">Aanvragen</h2>
                            <textarea name="aanvragen_new" cols="30" rows="10">Aanvragen</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="levertijd col-md-5">
                            <h2 class="columntitle">Levertijd</h2>
                            <input name="levertijd_new" type="text" value="Levertijd">
                        </div>

                        <div class="col-md-2"></div>

                        <div class="button_aanvragen col-md-5">
                            <button>Toevoegen<i class="fa fa-2x fa-long-arrow-right" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
            </div>
    <?php
    }
    ?>
