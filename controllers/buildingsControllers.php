<?php

require_once '../models/Database.php';
require_once '../models/Buildings.php';
require_once '../models/Research.php';
require_once '../models/Planets.php';
require_once '../controllers/arrayBuildingsLevel.php';
require_once '../controllers/arrayBuildingPrice.php';

$json_file = file_get_contents('../assets/json/ressource.json');
$json_data = json_decode($json_file, true);


$buildingsObj = new Buildings();
$arrayBuilding = $buildingsObj->getInfosBuildingForOneUser($_SESSION['User']['id']);

$researchObj = new Research();
$arrayResearch = $researchObj->getInfosResearchForOneUser($_SESSION['User']['id']);

$planetObj = new Planets();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['newBuilding'])) {
        switch ($_POST['buildingName']) {
            case 'Mine de métal':
                $arrayPriceLvl2 = [
                    'Metal' => 90,
                    'Cristal' => 22,
                    'Deuterium' => 0,
                    'Energy' => 25,
                    'TimeBuilt' => 360
                ];

                $timestamp =  mktime(date("G"), intval(date("i")), intval(date("s"), date("n"), date("j"), date("Y")));

                //On determine si on assez de ressource pour pouvoir construire le batiment
                $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

                if ($arrayRessourceUser['metal'] >= $arrayBuildingPrice[$_POST['buildingName']][1]['Metal']) {
                    if ($arrayRessourceUser['cristal'] >= $arrayBuildingPrice[$_POST['buildingName']][1]['Cristal']) {
                        $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, $arrayPriceLvl2['Metal'], $arrayPriceLvl2['Cristal'], $arrayPriceLvl2['Deuterium'], $arrayPriceLvl2['Energy'], $arrayPriceLvl2['TimeBuilt'], false, $timestamp, $_SESSION['User']['id']);
                        $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], $arrayBuildingPrice[$_POST['buildingName']][1]['Metal'], $arrayRessourceUser['cristal'],  $arrayBuildingPrice[$_POST['buildingName']][1]['Cristal'], $arrayRessourceUser['deuterium'], $arrayBuildingPrice[$_POST['buildingName']][1]['Deuterium'], $arrayRessourceUser['energy'], $arrayBuildingPrice[$_POST['buildingName']][1]['Energy'], $_SESSION['User']['id']);
                    } else {
                        $errorMsg['error']['cristal'] = 'Pas assez de cristal';
                    }
                } else {
                    $errorMsg['error']['metal'] = 'Pas assez de metal';
                }
                break;

            case 'Mine de cristal':
                $arrayPriceLvl2 = [
                    'Metal' => 77,
                    'Cristal' => 38,
                    'Deuterium' => 0,
                    'Energy' => 24,
                    'TimeBuilt' => 360
                ];

                $timestamp =  mktime(date("G"), intval(date("i")), intval(date("s"), date("n"), date("j"), date("Y")));

                //On determine si on assez de ressource pour pouvoir construire le batiment
                $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

                if ($arrayRessourceUser['metal'] >= $arrayBuildingPrice[$_POST['buildingName']][1]['Metal']) {
                    if ($arrayRessourceUser['cristal'] >= $arrayBuildingPrice[$_POST['buildingName']][1]['Cristal']) {
                        $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, $arrayPriceLvl2['Metal'], $arrayPriceLvl2['Cristal'], $arrayPriceLvl2['Deuterium'], $arrayPriceLvl2['Energy'], $arrayPriceLvl2['TimeBuilt'], false, $timestamp, $_SESSION['User']['id']);
                        //$planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], $arrayBuildingPrice[$_POST['buildingName']][1]['Metal'], $arrayRessourceUser['cristal'],  $arrayBuildingPrice[$_POST['buildingName']][1]['Cristal'], $arrayRessourceUser['deuterium'], $arrayBuildingPrice[$_POST['buildingName']][1]['Deuterium'], $arrayRessourceUser['energy'], $arrayBuildingPrice[$_POST['buildingName']][1]['Energy'], $_SESSION['User']['id']);
                    } else {
                        $errorMsg['error']['cristal'] = 'Pas assez de cristal';
                    }
                } else {
                    $errorMsg['error']['metal'] = 'Pas assez de metal';
                }
                break;

            default:

                break;
        }
    }
}
