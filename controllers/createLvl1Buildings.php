<?php

switch ($_POST['buildingName']) {
    
    case 'Mine de métal':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= costMetalForMineDeMetalPerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForMineDeMetalPerLevel(1)) {
                //On créer le batiment
                $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForMineDeMetalPerLevel(2), costCristalForMineDeMetalPerLevel(2), 0, costEnergyForMineDeMetalPerLevel(2), timeBuiltForBuilding(costMetalForMineDeMetalPerLevel(2), costCristalForMineDeMetalPerLevel(2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), false, $timestamp, $_SESSION['User']['id']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForMineDeMetalPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForMineDeMetalPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForMineDeMetalPerLevel(1), $_SESSION['User']['id']);
            }
        }
        $createBuilding = true;
        break;

    case 'Mine de cristal':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= costMetalForMineDeCristalPerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForMineDeCristalPerLevel(1)) {
                //On créer le batiment
                $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForMineDeCristalPerLevel(2), costCristalForMineDeCristalPerLevel(2), 0, costEnergyForMineDeCristalPerLevel(2), timeBuiltForBuilding(costMetalForMineDeCristalPerLevel(2), costCristalForMineDeCristalPerLevel(2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), false, $timestamp, $_SESSION['User']['id']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForMineDeCristalPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForMineDeCristalPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForMineDeCristalPerLevel(1), $_SESSION['User']['id']);
            }
        }
        $createBuilding = true;
        break;

    case 'Synthétiseur de deutérium':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= costMetalForDeuteriumPerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForDeuteriumPerLevel(1)) {
                //On créer le batiment
                $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForDeuteriumPerLevel(2), costCristalForDeuteriumPerLevel(2), 0, costEnergyForDeuteriumPerLevel(2), timeBuiltForBuilding(costMetalForDeuteriumPerLevel(2), costCristalForDeuteriumPerLevel(2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), false, $timestamp, $_SESSION['User']['id']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForDeuteriumPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForDeuteriumPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForDeuteriumPerLevel(1), $_SESSION['User']['id']);
            }
        }
        $createBuilding = true;
        break;

    case 'Centrale électrique solaire':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= costMetalForCentralSolairePerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForCentralSolairePerLevel(1)) {
                //On créer le batiment
                $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForCentralSolairePerLevel(2), costCristalForCentralSolairePerLevel(2), 0, costEnergyForCentralSolairePerLevel(2), timeBuiltForBuilding(costMetalForCentralSolairePerLevel(2), costCristalForCentralSolairePerLevel(2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), false, $timestamp, $_SESSION['User']['id']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreateCentrale($arrayRessourceUser['metal'], costMetalForCentralSolairePerLevel(1), $arrayRessourceUser['cristal'],  costCristalForCentralSolairePerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForCentralSolairePerLevel(1), $_SESSION['User']['id']);
            }
        }
        $createBuilding = true;
        break;

    case 'Usine de robots':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForUsineDeRobotsPerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForUsineDeRobotsPerLevel(1)) {
                if ($arrayRessourceUser['deuterium'] >= costDeuteriumForUsineDeRobotsPerLevel(1)) {
                    //On créer le batiment
                    $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForUsineDeRobotsPerLevel(2), costCristalForUsineDeRobotsPerLevel(2), costDeuteriumForUsineDeRobotsPerLevel(2), 0, timeBuiltForBuilding(costMetalForUsineDeRobotsPerLevel(2), costCristalForUsineDeRobotsPerLevel(2), $infosUsineRobots[0]['level'] == 1 && $infosUsineRobots[0]['built'] == 0 ? 0 : ($infosUsineRobots[0]['level'] > 1 && $infosUsineRobots[0]['built'] == 0 ? $infosUsineRobots[0]['level'] - 1 : $infosUsineRobots[0]['level']), $infosUsineNanites[0]['level']), false, $timestamp, $_SESSION['User']['id']);
                    //On update les ressource qu'on vien de dépenser
                    $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForUsineDeRobotsPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForUsineDeRobotsPerLevel(1), $arrayRessourceUser['deuterium'], costDeuteriumForUsineDeRobotsPerLevel(1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
                }
            }
        }
        $createBuilding = true;
        break;

    case 'Usine de nanites':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForUsineDeNanitesPerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForUsineDeNanitesPerLevel(1)) {
                if ($arrayRessourceUser['deuterium'] >= costDeuteriumForUsineDeNanitesPerLevel(1)) {
                    //On créer le batiment
                    $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForUsineDeNanitesPerLevel(2), costCristalForUsineDeNanitesPerLevel(2), costDeuteriumForUsineDeNanitesPerLevel(2), 0, timeBuiltForBuilding(costMetalForUsineDeNanitesPerLevel(2), costCristalForUsineDeNanitesPerLevel(2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), false, $timestamp, $_SESSION['User']['id']);
                    //On update les ressource qu'on vien de dépenser
                    $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForUsineDeNanitesPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForUsineDeNanitesPerLevel(1), $arrayRessourceUser['deuterium'], costDeuteriumForUsineDeNanitesPerLevel(1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
                }
            }
        }
        $createBuilding = true;
        break;

    case 'Chantier spatial':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForChantierSpatialPerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForChantierSpatialPerLevel(1)) {
                if ($arrayRessourceUser['deuterium'] >= costDeuteriumForChantierSpatialPerLevel(1)) {
                    //On créer le batiment
                    $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForChantierSpatialPerLevel(2), costCristalForChantierSpatialPerLevel(2), costDeuteriumForChantierSpatialPerLevel(2), 0, timeBuiltForBuilding(costMetalForChantierSpatialPerLevel(2), costCristalForChantierSpatialPerLevel(2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), false, $timestamp, $_SESSION['User']['id']);
                    //On update les ressource qu'on vien de dépenser
                    $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForChantierSpatialPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForChantierSpatialPerLevel(1), $arrayRessourceUser['deuterium'], costDeuteriumForChantierSpatialPerLevel(1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
                }
            }
        }
        $createBuilding = true;
        break;

    case 'Hangar de métal':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= costMetalForHangarDeMetalPerLevel(1)) {
            //On créer le batiment
            $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForHangarDeMetalPerLevel(2), 0, 0, 0, timeBuiltForBuilding(costMetalForHangarDeMetalPerLevel(2), 0, $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), false, $timestamp, $_SESSION['User']['id']);
            //On update les ressource qu'on vien de dépenser
            $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForHangarDeMetalPerLevel(1), $arrayRessourceUser['cristal'],  0, $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        }
        $createBuilding = true;
        break;

    case 'Hangar de cristal':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForHangarDeCristalPerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForHangarDeCristalPerLevel(1)) {
                //On créer le batiment
                $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForHangarDeCristalPerLevel(2), costCristalForHangarDeCristalPerLevel(2), 0, 0, timeBuiltForBuilding(costMetalForHangarDeCristalPerLevel(2), costCristalForHangarDeCristalPerLevel(2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), false, $timestamp, $_SESSION['User']['id']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForHangarDeCristalPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForHangarDeCristalPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
            }
        }
        $createBuilding = true;
        break;

    case 'Réservoir de deutérium':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForHangarDeDeutPerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForHangarDeDeutPerLevel(1)) {
                //On créer le batiment
                $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForHangarDeDeutPerLevel(2), costCristalForHangarDeDeutPerLevel(2), 0, 0, timeBuiltForBuilding(costMetalForHangarDeDeutPerLevel(2), costCristalForHangarDeDeutPerLevel(2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), false, $timestamp, $_SESSION['User']['id']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForHangarDeDeutPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForHangarDeDeutPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
            }
        }
        $createBuilding = true;
        break;

    case 'Laboratoire de recherche':

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForLaboDeRecherchePerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForLaboDeRecherchePerLevel(1)) {
                if ($arrayRessourceUser['deuterium'] >= costDeuteriumForLaboDeRecherchePerLevel(1)) {
                    //On créer le batiment
                    $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForLaboDeRecherchePerLevel(2), costCristalForLaboDeRecherchePerLevel(2), costDeuteriumForLaboDeRecherchePerLevel(2), 0, timeBuiltForBuilding(costMetalForLaboDeRecherchePerLevel(2), costCristalForLaboDeRecherchePerLevel(2), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']), false, $timestamp, $_SESSION['User']['id']);
                    //On update les ressource qu'on vien de dépenser
                    $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForLaboDeRecherchePerLevel(1), $arrayRessourceUser['cristal'],  costCristalForLaboDeRecherchePerLevel(1), $arrayRessourceUser['deuterium'], costDeuteriumForLaboDeRecherchePerLevel(1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
                }
            }
        }
        $createBuilding = true;
        break;

    default:

        break;
}