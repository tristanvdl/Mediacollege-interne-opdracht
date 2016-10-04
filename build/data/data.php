<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tristan
 * Date: 4-10-2016
 * Time: 16:31
 */
include '../models/Database.php';
$database = new Database();
echo $database->SearchJSONEnc('procedures','q');