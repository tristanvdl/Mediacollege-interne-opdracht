<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Helpdesk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/app.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="assets/images/favicon/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="assets/images/favicon/favicon-16x16.png" sizes="16x16"/>
</head>
<body>

<div class="menu">
    <a href="?page=home"><img src="assets/images/logosub.jpg" class="menuimg"></a>
    <div class="topbar">
        <strong>Spoedmelding?</strong> Bel direct naar: 020 1234567
    </div>

    <div class="userthingy">
        <div class="userwrapper">
            <div class="textleft">
                <?php if (isset($_SESSION['user'])) { ?>
                    <p><?php echo $_SESSION['user'] ?><Br></p>
                    <a href="?page=login&action=logout">Uitloggen</a>
                <?php }else{?>
                    <p>Welkom!<Br></p>
                    <a href="?page=login">Inloggen</a>
                <?php } ?>
            </div>
            <div class="iconright">
                <i class="fa fa-user" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</div>

<div class="content">
