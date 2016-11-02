<?php
session_start();
echo $_SESSION['user'];
echo "</br>";
echo $_SESSION['user_level'];
include 'models/Autoload.php';
Autoload::register();

$db = Database::getInstance();
$con = $db->getDB();

$action = isset($_GET['page']) ? $_GET['page'] : 'homepage';


include 'views/header.php';
switch ($action) {
    case 'result':
      include 'views/result.php';
      break;

    case 'admin_cms':
        include 'views/cms.php';
        break;

    case 'ticket':
        include 'views/ticket.php';
        break;

    case 'register':
        include 'views/register.php';
        break;

    case 'login':
        include 'views/login.php';
        break;

    default:
        include 'views/home.php';
        break;
}
include 'views/footer.php';
