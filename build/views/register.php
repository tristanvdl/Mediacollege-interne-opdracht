<div class="container">
    <div class="row">
        <?php
        $userService = new UserService($con);

        if (isset($_POST['email'])) {
            if (strpos($_POST['email'], 'ma-web.nl') == false) {
                ?>
                <h1>Geen MA Email</h1>
                <?php
            } else {
                $email = $userService->checkUser();
                if ($email['email'] == $_POST['email']) {
                    ?>
                    <h1>bestaat al</h1>
                    <?php
                } else {
                    $userService->registerUser();
                    echo 'succes!';
                }
            }
        }
        ?>
        <form method="post" action="?page=register">
            <input type="email" name="email">
            <input type="password" name="password">
            <input type="submit">
        </form>
    </div>
</div>

