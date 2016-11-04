<!-- <div class="container">
    <div class="row"> -->
        <?php
        $userService = new UserService($con);

        if (isset($_POST['submit_register'])) {
            if (strpos($_POST['email'], 'ma-web.nl') == false) {
                $noMaEmail = true;
            } else {
                $noMaEmail = false;
                $email = $userService->checkIfExist();
                if ($email['email'] == $_POST['email']) {
                    ?>
                    <h1>bestaat al</h1>
                    <?php
                }
                if ($_POST['password'] == "") {
                    echo "voer een wachtwoord in";
                } else {
                    $userService->registerUser();
                    echo 'succes!';
                }
            }
        }
        ?>
        <form method="post" action="?page=register" autocomplete="off" class="loginform regform">
          <h1>Register</h1>
          <table>
            <?php
            if(isset($noMaEmail) && $noMaEmail){
              echo "<p class='mailwarning'>Je hebt een ma-web e-mail adres nodig om te registreren</p>";
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
            <input type="submit" name="submit_register"  class="btn btn-primary actionbutton loginbutton regbutton">

        </form>

        <!--  -->
        <!-- <form method="post" action="?page=login" autocomplete="off" class="loginform">
                <h1> Login </h1>
                <table>
                  <tr>

                    <th class="iconth"><i class="fa fa-user" aria-hidden="true"></i></th>
                    <th class="inputth"><input type="email" name="email" placeholder="Gebruikersnaam"></th>
                  </tr>

                  <tr class="seperator"></tr>

                  <tr>
                    <th class="iconth"><i class="fa fa-key" aria-hidden="true"></i></th>
                    <th class="inputth"><input type="password" name="password" placeholder="Wachtwoord"></th>
                  </tr>
                </table>

              <a href="#">Wachtwoord Vergeten?</a>
            <input type="submit" name="submit_login" class="btn btn-primary actionbutton loginbutton" value="Log In">
        </form> -->
        <!--  -->
    <!-- </div>
</div> -->
