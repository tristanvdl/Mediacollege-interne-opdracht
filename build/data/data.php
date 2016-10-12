<?php
include '../models/Database.php';
include '../models/ProcedureSearch.php';
$database = Database::getInstance();
$con = $database->getDB();
$searchData = new ProcedureSearch($con);
echo $searchData->SearchItems('procedures','q');
