<?php
$userService = new UserService($con);

if (isset($_POST['email'])){
    $email = $userService->checkUser();
    if ($email['email'] == $_POST['email'] ) {
        ?>
        <h1>bestaat al</h1>
        <form method="post" action="?page=register">
            <input type="email" name="email">
            <input type="password" name="password">
            <input type="submit">
        </form>
        <?php
    }else {
        $userService->registerUser();
        echo 'succes!'; 
    }
}
?>
