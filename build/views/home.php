<?php

?>

<div class="container">
    <div class="row">
        <div class="home_page">
            <div class="search_wrapper">
                <div class="col-md-12 page-title-home">
                    <h1>Waarmee kunnen wij u helpen?
                        <?php
                        if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0) {
                            ?>
                            <a href="">
                                <a href="?page=admin_cms&ticket_id=new" class="btn btn-primary actionbutton">
                                    Nieuw
                                </a>
                            </a>
                            <?php
                        }
                        ?>
                    </h1>
                    <p>Staat je probleem er niet bij? <a href="?page=ticket">Klik hier!</a></p>
                </div>
                <div class="col-md-12">
                    <form class="searchform" method="post" action="?page=results" autocomplete="off">
                        <i class="fa fa-search searchicon" aria-hidden="true"></i>
                        <input class="search" type="text" name="searchq">
                        <div class="results"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
