<?php
if (isset($_POST['submit_login'])) {
    $userService = new UserService($con);
    if ($userService->checkCredentialUser()) {
        $user = $userService->loginUser();
        echo "welkom " . $user[0];
    } else {
        echo "je bestaat niet";
    }

}


?>
<div class="container">
    <div class="row">
        <form method="post" action="?page=login" autocomplete="off">
            <input type="email" name="email">
            <input type="password" name="password">
            <input type="submit" name="submit_login">
        </form>
    </div>
</div>
