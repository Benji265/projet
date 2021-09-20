<?php

switch ($_POST['buildingName']) {
    case 'Mine de métal':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= costMetalForMineDeMetalPerLevel($_POST['buildingLevel'] + 1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForMineDeMetalPerLevel($_POST['buildingLevel'] + 1)) {
                //On update le batiment
                $buildingsObj->updateBuilding(($_POST['buildingLevel'] + 1), costMetalForMineDeMetalPerLevel($_POST['buildingLevel'] + 2), costCristalForMineDeMetalPerLevel($_POST['buildingLevel'] + 2), 0, costEnergyForMineDeMetalPerLevel($_POST['buildingLevel'] + 2), timeBuiltForBuilding(costMetalForMineDeMetalPerLevel($_POST['buildingLevel'] + 2), costCristalForMineDeMetalPerLevel($_POST['buildingLevel'] + 2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), $timestamp, $_SESSION['User']['id'], $_POST['buildingName']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForMineDeMetalPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['cristal'],  costCristalForMineDeMetalPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForMineDeMetalPerLevel($_POST['buildingLevel'] + 1), $_SESSION['User']['id']);
            }
        }
        $createBuilding = true;
        break;

    case 'Mine de cristal':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= costMetalForMineDeCristalPerLevel($_POST['buildingLevel'] + 1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForMineDeCristalPerLevel($_POST['buildingLevel'] + 1)) {
                //On créer le batiment
                $buildingsObj->updateBuilding(($_POST['buildingLevel'] + 1), costMetalForMineDeCristalPerLevel($_POST['buildingLevel'] + 2), costCristalForMineDeCristalPerLevel($_POST['buildingLevel'] + 2), 0, costEnergyForMineDeCristalPerLevel($_POST['buildingLevel'] + 2), timeBuiltForBuilding(costMetalForMineDeCristalPerLevel($_POST['buildingLevel'] + 2), costCristalForMineDeCristalPerLevel($_POST['buildingLevel'] + 2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), $timestamp, $_SESSION['User']['id'], $_POST['buildingName']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForMineDeCristalPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['cristal'],  costCristalForMineDeCristalPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForMineDeCristalPerLevel($_POST['buildingLevel'] + 1), $_SESSION['User']['id']);
            }
        }
        $createBuilding = true;
        break;

    case 'Synthétiseur de deutérium':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= costMetalForDeuteriumPerLevel($_POST['buildingLevel'] + 1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForDeuteriumPerLevel($_POST['buildingLevel'] + 1)) {
                //On créer le batiment
                $buildingsObj->updateBuilding(($_POST['buildingLevel'] + 1), costMetalForDeuteriumPerLevel($_POST['buildingLevel'] + 2), costCristalForDeuteriumPerLevel($_POST['buildingLevel'] + 2), 0, costEnergyForDeuteriumPerLevel($_POST['buildingLevel'] + 2), timeBuiltForBuilding(costMetalForDeuteriumPerLevel($_POST['buildingLevel'] + 2), costCristalForDeuteriumPerLevel($_POST['buildingLevel'] + 2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), $timestamp, $_SESSION['User']['id'], $_POST['buildingName']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForDeuteriumPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['cristal'],  costCristalForDeuteriumPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForDeuteriumPerLevel($_POST['buildingLevel'] + 1), $_SESSION['User']['id']);
            }
        }
        $createBuilding = true;
        break;

    case 'Centrale électrique solaire':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= costMetalForCentralSolairePerLevel($_POST['buildingLevel'] + 1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForCentralSolairePerLevel($_POST['buildingLevel'] + 1)) {
                //On créer le batiment
                $buildingsObj->updateBuilding(($_POST['buildingLevel'] + 1), costMetalForCentralSolairePerLevel($_POST['buildingLevel'] + 2), costCristalForCentralSolairePerLevel($_POST['buildingLevel'] + 2), 0, costEnergyForCentralSolairePerLevel($_POST['buildingLevel'] + 2), timeBuiltForBuilding(costMetalForCentralSolairePerLevel($_POST['buildingLevel'] + 2), costCristalForCentralSolairePerLevel($_POST['buildingLevel'] + 2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), $timestamp, $_SESSION['User']['id'], $_POST['buildingName']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreateCentrale($arrayRessourceUser['metal'], costMetalForCentralSolairePerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['cristal'],  costCristalForCentralSolairePerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForCentralSolairePerLevel($_POST['buildingLevel'] + 1), $_SESSION['User']['id']);
            }
        }
        $createBuilding = true;
        break;

    case 'Usine de robots':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForUsineDeRobotsPerLevel($_POST['buildingLevel'] + 1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForUsineDeRobotsPerLevel($_POST['buildingLevel'] + 1)) {
                if ($arrayRessourceUser['deuterium'] >= costDeuteriumForUsineDeRobotsPerLevel($_POST['buildingLevel'] + 1)) {
                    //On créer le batiment
                    $buildingsObj->updateBuilding(($_POST['buildingLevel'] + 1), costMetalForUsineDeRobotsPerLevel($_POST['buildingLevel'] + 2), costCristalForUsineDeRobotsPerLevel($_POST['buildingLevel'] + 2), costDeuteriumForUsineDeRobotsPerLevel($_POST['buildingLevel'] + 2), 0, timeBuiltForBuilding(costMetalForUsineDeRobotsPerLevel($_POST['buildingLevel'] + 2), costCristalForUsineDeRobotsPerLevel($_POST['buildingLevel'] + 2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), $timestamp, $_SESSION['User']['id'], $_POST['buildingName']);
                    //On update les ressource qu'on vien de dépenser
                    $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForUsineDeRobotsPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['cristal'],  costCristalForUsineDeRobotsPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['deuterium'], costDeuteriumForUsineDeRobotsPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
                }
            }
        }
        $createBuilding = true;
        break;

    case 'Usine de nanites':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForUsineDeNanitesPerLevel($_POST['buildingLevel'] + 1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForUsineDeNanitesPerLevel($_POST['buildingLevel'] + 1)) {
                if ($arrayRessourceUser['deuterium'] >= costDeuteriumForUsineDeNanitesPerLevel($_POST['buildingLevel'] + 1)) {
                    //On créer le batiment
                    $buildingsObj->updateBuilding(($_POST['buildingLevel'] + 1), costMetalForUsineDeNanitesPerLevel($_POST['buildingLevel'] + 2), costCristalForUsineDeNanitesPerLevel($_POST['buildingLevel'] + 2), costDeuteriumForUsineDeNanitesPerLevel($_POST['buildingLevel'] + 2), 0, timeBuiltForBuilding(costMetalForUsineDeNanitesPerLevel($_POST['buildingLevel'] + 2), costCristalForUsineDeNanitesPerLevel($_POST['buildingLevel'] + 2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), $timestamp, $_SESSION['User']['id'], $_POST['buildingName']);
                    //On update les ressource qu'on vien de dépenser
                    $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForUsineDeNanitesPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['cristal'],  costCristalForUsineDeNanitesPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['deuterium'], costDeuteriumForUsineDeNanitesPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
                }
            } 
        } 
        $createBuilding = true;
        break;

    case 'Chantier spatial':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForChantierSpatialPerLevel($_POST['buildingLevel'] + 1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForChantierSpatialPerLevel($_POST['buildingLevel'] + 1)) {
                if ($arrayRessourceUser['deuterium'] >= costDeuteriumForChantierSpatialPerLevel($_POST['buildingLevel'] + 1)) {
                    //On créer le batiment
                    $buildingsObj->updateBuilding(($_POST['buildingLevel'] + 1), costMetalForChantierSpatialPerLevel($_POST['buildingLevel'] + 2), costCristalForChantierSpatialPerLevel($_POST['buildingLevel'] + 2), costDeuteriumForChantierSpatialPerLevel($_POST['buildingLevel'] + 2), 0, timeBuiltForBuilding(costMetalForChantierSpatialPerLevel($_POST['buildingLevel'] + 2), costCristalForChantierSpatialPerLevel($_POST['buildingLevel'] + 2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), $timestamp, $_SESSION['User']['id'], $_POST['buildingName']);
                    //On update les ressource qu'on vien de dépenser
                    $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForChantierSpatialPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['cristal'],  costCristalForChantierSpatialPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['deuterium'], costDeuteriumForChantierSpatialPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
                } 
            } 
        } 
        $createBuilding = true;
        break;

    case 'Hangar de métal':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= costMetalForHangarDeMetalPerLevel($_POST['buildingLevel'] + 1)) {
            //On créer le batiment
            $buildingsObj->updateBuilding(($_POST['buildingLevel'] + 1), costMetalForHangarDeMetalPerLevel($_POST['buildingLevel'] + 2), 0, 0, 0, timeBuiltForBuilding(costMetalForHangarDeMetalPerLevel($_POST['buildingLevel'] + 2), 0, $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), $timestamp, $_SESSION['User']['id'], $_POST['buildingName']);
            //On update les ressource qu'on vien de dépenser
            $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForHangarDeMetalPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['cristal'],  0, $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        } 
        $createBuilding = true;
        break;

    case 'Hangar de cristal':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForHangarDeCristalPerLevel($_POST['buildingLevel'] + 1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForHangarDeCristalPerLevel($_POST['buildingLevel'] + 1)) {
                //On créer le batiment
                $buildingsObj->updateBuilding(($_POST['buildingLevel'] + 1), costMetalForHangarDeCristalPerLevel($_POST['buildingLevel'] + 2), costCristalForHangarDeCristalPerLevel($_POST['buildingLevel'] + 2), 0, 0, timeBuiltForBuilding(costMetalForHangarDeCristalPerLevel($_POST['buildingLevel'] + 2), costCristalForHangarDeCristalPerLevel($_POST['buildingLevel'] + 2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), $timestamp, $_SESSION['User']['id'], $_POST['buildingName']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForHangarDeCristalPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['cristal'],  costCristalForHangarDeCristalPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
            } 
        } 
        $createBuilding = true;
        break;

    case 'Réservoir de deutérium':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForHangarDeDeutPerLevel($_POST['buildingLevel'] + 1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForHangarDeDeutPerLevel($_POST['buildingLevel'] + 1)) {
                //On créer le batiment
                $buildingsObj->updateBuilding(($_POST['buildingLevel'] + 1), costMetalForHangarDeDeutPerLevel($_POST['buildingLevel'] + 2), costCristalForHangarDeDeutPerLevel($_POST['buildingLevel'] + 2), 0, 0, timeBuiltForBuilding(costMetalForHangarDeDeutPerLevel($_POST['buildingLevel'] + 2), costCristalForHangarDeDeutPerLevel($_POST['buildingLevel'] + 2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), $timestamp, $_SESSION['User']['id'], $_POST['buildingName']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForHangarDeDeutPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['cristal'],  costCristalForHangarDeDeutPerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
            } 
        } 
        $createBuilding = true;
        break;

    case 'Laboratoire de recherche':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForLaboDeRecherchePerLevel($_POST['buildingLevel'] + 1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForLaboDeRecherchePerLevel($_POST['buildingLevel'] + 1)) {
                if ($arrayRessourceUser['deuterium'] >= costDeuteriumForLaboDeRecherchePerLevel($_POST['buildingLevel'] + 1)) {
                    //On créer le batiment
                    $buildingsObj->updateBuilding(($_POST['buildingLevel'] + 1), costMetalForLaboDeRecherchePerLevel($_POST['buildingLevel'] + 2), costCristalForLaboDeRecherchePerLevel($_POST['buildingLevel'] + 2), costDeuteriumForLaboDeRecherchePerLevel($_POST['buildingLevel'] + 2), 0, timeBuiltForBuilding(costMetalForLaboDeRecherchePerLevel($_POST['buildingLevel'] + 2), costCristalForLaboDeRecherchePerLevel($_POST['buildingLevel'] + 2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), $timestamp, $_SESSION['User']['id'], $_POST['buildingName']);
                    //On update les ressource qu'on vien de dépenser
                    $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForLaboDeRecherchePerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['cristal'],  costCristalForLaboDeRecherchePerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['deuterium'], costDeuteriumForLaboDeRecherchePerLevel($_POST['buildingLevel'] + 1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
                }
            }
        }
        $createBuilding = true;
        break;


    default:

        break;
}
