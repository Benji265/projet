<?php

require_once '../models/Database.php';
require_once '../models/Buildings.php';
require_once '../models/Research.php';

$json_file = file_get_contents('../assets/json/ressource.json');
$json_data = json_decode($json_file, true);


$buildingsObj = new Buildings();
$arrayBuilding = $buildingsObj->getInfosBuildingForOneUser($_SESSION['User']['id']);

$researchObj = new Research();
$arrayResearch = $researchObj->getInfosResearchForOneUser($_SESSION['User']['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['newBuilding'])) {
        switch ($_POST['buildingName']) {
            case 'Mine de métal':
                $arrayPriceLvl2 = [
                    'Metal' => 90,
                    'Cristal' => 22,
                    'Deuterium' => 0,
                    'Energy' => 25
                ];
                $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, $arrayPriceLvl2['Metal'], $arrayPriceLvl2['Cristal'], $arrayPriceLvl2['Deuterium'], $arrayPriceLvl2['Energy'], $_SESSION['User']['id']);
                break;
            
            default:
                
                break;
        }
    }
}
