<?php
$userService = new UserService($con);


        if (isset($_SESSION['user'])) {
            echo "<div class='loginwarning'>Je bent al ingelogd!</div>";
        } else {
        if (isset($_POST['submit_register'])) {
            if (strpos($_POST['email'], 'ma-web.nl') == false) {
                $noMaEmail = true;
            } else {
                $noMaEmail = false;
                $email = $userService->checkIfExist();
                if ($email['email'] == $_POST['email']) {
                    $alreadyexists = true;
                }else if ($_POST['password'] == "") {
                    $nopwentered = true;
                } else {
                    $userService->registerUser();
                    echo("<script>window.location.assign(\"?page=login\")</script>");
                }
            }
        }
        ?>
        <form method="post" action="?page=register" autocomplete="off" class="loginform regform">
          <h1>Registreren</h1>
          <table>
            <?php
            if(isset($noMaEmail) && $noMaEmail){
              echo "<p class=warning>Je hebt een ma-web e-mail adres nodig om te registreren</p>";
            }
            else if(isset($alreadyexists) && $alreadyexists){
              echo "<p class=warning>Dat e-mail adres is al in gebruik.</p>";
            }
            else if(isset($nopwentered) && $nopwentered){
              echo "<p class=warning>Voer een wachtwoord in.</p>";
            }
            ?>
            <tr>
              <th class="iconth"><i class="fa fa-user" aria-hidden="true"></i></th>
              <th class="inputth"><input type="email" name="email" placeholder="E-mail"></th>
            </tr>
              <tr class="seperator"></tr>
            <tr>
              <th class="iconth"><i class="fa fa-key" aria-hidden="true"></i></th>
              <th class="inputth"><input type="password" name="password" placeholder="Wachtwoord"></th>
            </tr>
        </table>
        <input type="submit" name="submit_register" class="btn btn-primary actionbutton loginbutton regbutton">


</form>

<?php } ?>
