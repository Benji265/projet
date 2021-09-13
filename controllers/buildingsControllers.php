<?php

require_once '../models/Database.php';
require_once '../models/Buildings.php';
require_once '../models/Research.php';
require_once '../models/Planets.php';
require_once '../controllers/arrayBuildingsLevel.php';
require_once '../controllers/arrayBuildingPrice.php';
require_once '../function/function.php';

$json_file = file_get_contents('../assets/json/ressource.json');
$json_data = json_decode($json_file, true);


$buildingsObj = new Buildings();
$arrayBuilding = $buildingsObj->getInfosBuildingForOneUser($_SESSION['User']['id']);

$researchObj = new Research();
$arrayResearch = $researchObj->getInfosResearchForOneUser($_SESSION['User']['id']);

$planetObj = new Planets();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['newBuilding'])) {
        require_once '../controllers/createLvl1Buildings.php';
    }
}
