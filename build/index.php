<?php
include 'models/Autoload.php';
Autoload::register();

$db = Database::getInstance();
$con = $db->getDB();

$action = isset($_GET['page']) ? $_GET['page'] : 'homepage';

session_start();
include 'views/header.php';
echo "<div class='content'>";
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

    default:
        include 'views/home.php';
        break;
}
echo "</div>";
include 'views/footer.php';
