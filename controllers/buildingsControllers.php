<?php

require_once '../models/Database.php';
require_once '../models/Buildings.php';

$json_file = file_get_contents('../assets/json/ressource.json');
$json_data = json_decode($json_file, true);


$buildingsObj = new Buildings();
$arrayBuilding = $buildingsObj->getInfosBuildingForOneUser($_SESSION['User']['id']);