<?php
if (isset($_POST['submit_login'])) {
    $userService = new UserService($con);
    if ($userService->checkCredentialUser()) {
        $user = $userService->loginUser();
        echo "welkom " . $user[0];
    } else {
        echo "Incorrect wachtwoord of email";
    }
}
$action = isset($_GET['action']) ? $_GET['action'] : '';
if ($action == "logout"){
   session_destroy();
}
?>
<!-- <div class="container">
    <div class="row"> -->
        <form method="post" action="?page=login" autocomplete="off" class="loginform">
                <h1> Login </h1>
                <table>
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

              <a href="#">Wachtwoord Vergeten?</a>
            <input type="submit" name="submit_login" class="btn btn-primary actionbutton loginbutton" value="Log In">
        </form>
    <!-- </div>
</div> -->
