<?php

switch ($_POST['buildingName']) {
    case 'Mine de métal':

        //On recupere l'heure a laquelle on a cliquer pour le créer
        $timestamp =  mktime(date("G"), intval(date("i")), intval(date("s"), date("n"), date("j"), date("Y")));

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= costMetalForMineDeMetalPerLevel($_POST['buildingLevel'] + 1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForMineDeMetalPerLevel($_POST['buildingLevel'] + 1)) {
                //On update le batiment
                $buildingsObj->updateBuilding(($_POST['buildingLevel'] + 1), costMetalForMineDeMetalPerLevel($_POST['buildingLevel'] + 1), costCristalForMineDeMetalPerLevel($_POST['buildingLevel'] + 1), 0, costEnergyForMineDeMetalPerLevel($_POST['buildingLevel'] + 1), timeBuiltForBuilding(costMetalForMineDeMetalPerLevel($_POST['buildingLevel'] + 1), costCristalForMineDeMetalPerLevel($_POST['buildingLevel'] + 1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), $timestamp, $_SESSION['User']['id'], $_POST['buildingName']);
                //On update les ressource qu'on vien de dépenser
                //$planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForMineDeMetalPerLevel($_POST['buildingLevel']), $arrayRessourceUser['cristal'],  costCristalForMineDeMetalPerLevel($_POST['buildingLevel']), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForMineDeMetalPerLevel($_POST['buildingLevel']), $_SESSION['User']['id']);
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
