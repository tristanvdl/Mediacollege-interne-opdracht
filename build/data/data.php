<?php
include '../models/Database.php';
include '../models/Procedure.php';
$database = Database::getInstance();
$con = $database->getDB();
$searchData = new Procedure($con);
echo $searchData->SearchProcedure('procedures','q');
