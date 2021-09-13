<?php

switch ($_POST['buildingName']) {
    case 'Mine de métal':

        //On recupere l'heure a laquelle on a cliquer pour le créer
        $timestamp =  mktime(date("G"), intval(date("i")), intval(date("s"), date("n"), date("j"), date("Y")));

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= costMetalForMineDeMetalPerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForMineDeMetalPerLevel(1)) {
                //On créer le batiment
                $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForMineDeMetalPerLevel(2), costCristalForMineDeMetalPerLevel(2), 0, costEnergyForMineDeMetalPerLevel(2), 360, false, $timestamp, $_SESSION['User']['id']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForMineDeMetalPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForMineDeMetalPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForMineDeMetalPerLevel(1), $_SESSION['User']['id']);
            } else {
                $errorMsg['error']['cristal'] = 'Pas assez de cristal';
            }
        } else {
            $errorMsg['error']['metal'] = 'Pas assez de metal';
        }
        break;

    case 'Mine de cristal':

        //On recupere l'heure a laquelle on a cliquer pour le créer
        $timestamp =  mktime(date("G"), intval(date("i")), intval(date("s"), date("n"), date("j"), date("Y")));

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= $arrayBuildingPrice[$_POST['buildingName']][1]['Metal']) {
            if ($arrayRessourceUser['cristal'] >= $arrayBuildingPrice[$_POST['buildingName']][1]['Cristal']) {
                //On créer le batiment
                $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForMineDeCristalPerLevel(2), costCristalForMineDeCristalPerLevel(2), 0, costEnergyForMineDeCristalPerLevel(2), 360, false, $timestamp, $_SESSION['User']['id']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForMineDeCristalPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForMineDeCristalPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForMineDeCristalPerLevel(1), $_SESSION['User']['id']);
            } else {
                $errorMsg['error']['cristal'] = 'Pas assez de cristal';
            }
        } else {
            $errorMsg['error']['metal'] = 'Pas assez de metal';
        }
        break;

    case 'Synthétiseur de deutérium':

        //On recupere l'heure a laquelle on a cliquer pour le créer
        $timestamp =  mktime(date("G"), intval(date("i")), intval(date("s"), date("n"), date("j"), date("Y")));

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= $arrayBuildingPrice[$_POST['buildingName']][1]['Metal']) {
            if ($arrayRessourceUser['cristal'] >= $arrayBuildingPrice[$_POST['buildingName']][1]['Cristal']) {
                //On créer le batiment
                $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForDeuteriumPerLevel(2), costCristalForDeuteriumPerLevel(2), 0, costEnergyForDeuteriumPerLevel(2), 360, false, $timestamp, $_SESSION['User']['id']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForDeuteriumPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForDeuteriumPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForDeuteriumPerLevel(1), $_SESSION['User']['id']);
            } else {
                $errorMsg['error']['cristal'] = 'Pas assez de cristal';
            }
        } else {
            $errorMsg['error']['metal'] = 'Pas assez de metal';
        }
        break;

    case 'Centrale électrique solaire':

        //On recupere l'heure a laquelle on a cliquer pour le créer
        $timestamp =  mktime(date("G"), intval(date("i")), intval(date("s"), date("n"), date("j"), date("Y")));

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >= $arrayBuildingPrice[$_POST['buildingName']][1]['Metal']) {
            if ($arrayRessourceUser['cristal'] >= $arrayBuildingPrice[$_POST['buildingName']][1]['Cristal']) {
                //On créer le batiment
                $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForCentralSolairePerLevel(2), costCristalForCentralSolairePerLevel(2), 0, costEnergyForCentralSolairePerLevel(2), 360, false, $timestamp, $_SESSION['User']['id']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreateCentrale($arrayRessourceUser['metal'], costMetalForCentralSolairePerLevel(1), $arrayRessourceUser['cristal'],  costCristalForCentralSolairePerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForCentralSolairePerLevel(1), $_SESSION['User']['id']);
            } else {
                $errorMsg['error']['cristal'] = 'Pas assez de cristal';
            }
        } else {
            $errorMsg['error']['metal'] = 'Pas assez de metal';
        }
        break;

    case 'Usine de robots':

        //On recupere l'heure a laquelle on a cliquer pour le créer
        $timestamp =  mktime(date("G"), intval(date("i")), intval(date("s"), date("n"), date("j"), date("Y")));

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForUsineDeRobotsPerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForUsineDeRobotsPerLevel(1)) {
                if ($arrayRessourceUser['deuterium'] >= costDeuteriumForUsineDeRobotsPerLevel(1)) {
                    //On créer le batiment
                    $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForUsineDeRobotsPerLevel(2), costCristalForUsineDeRobotsPerLevel(2), costDeuteriumForUsineDeRobotsPerLevel(2), 0, 360, false, $timestamp, $_SESSION['User']['id']);
                    //On update les ressource qu'on vien de dépenser
                    $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForUsineDeRobotsPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForUsineDeRobotsPerLevel(1), $arrayRessourceUser['deuterium'], costDeuteriumForUsineDeRobotsPerLevel(1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
                } else {
                    $errorMsg['error']['deuterium'] = 'Pas assez de deuterium';
                }
            } else {
                $errorMsg['error']['cristal'] = 'Pas assez de cristal';
            }
        } else {
            $errorMsg['error']['metal'] = 'Pas assez de metal';
        }
        break;

    case 'Usine de nanites':

        //On recupere l'heure a laquelle on a cliquer pour le créer
        $timestamp =  mktime(date("G"), intval(date("i")), intval(date("s"), date("n"), date("j"), date("Y")));

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForUsineDeNanitesPerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForUsineDeNanitesPerLevel(1)) {
                if ($arrayRessourceUser['deuterium'] >= costDeuteriumForUsineDeNanitesPerLevel(1)) {
                    //On créer le batiment
                    $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForUsineDeNanitesPerLevel(2), costCristalForUsineDeNanitesPerLevel(2), costDeuteriumForUsineDeNanitesPerLevel(2), 0, 360, false, $timestamp, $_SESSION['User']['id']);
                    //On update les ressource qu'on vien de dépenser
                    $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForUsineDeNanitesPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForUsineDeNanitesPerLevel(1), $arrayRessourceUser['deuterium'], costDeuteriumForUsineDeNanitesPerLevel(1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
                } else {
                    $errorMsg['error']['deuterium'] = 'Pas assez de deuterium';
                }
            } else {
                $errorMsg['error']['cristal'] = 'Pas assez de cristal';
            }
        } else {
            $errorMsg['error']['metal'] = 'Pas assez de metal';
        }
        break;

    case 'Chantier spatial':

        //On recupere l'heure a laquelle on a cliquer pour le créer
        $timestamp =  mktime(date("G"), intval(date("i")), intval(date("s"), date("n"), date("j"), date("Y")));

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForChantierSpatialPerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForChantierSpatialPerLevel(1)) {
                if ($arrayRessourceUser['deuterium'] >= costDeuteriumForChantierSpatialPerLevel(1)) {
                    //On créer le batiment
                    $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForChantierSpatialPerLevel(2), costCristalForChantierSpatialPerLevel(2), costDeuteriumForChantierSpatialPerLevel(2), 0, 360, false, $timestamp, $_SESSION['User']['id']);
                    //On update les ressource qu'on vien de dépenser
                    $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForChantierSpatialPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForChantierSpatialPerLevel(1), $arrayRessourceUser['deuterium'], costDeuteriumForChantierSpatialPerLevel(1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
                } else {
                    $errorMsg['error']['deuterium'] = 'Pas assez de deuterium';
                }
            } else {
                $errorMsg['error']['cristal'] = 'Pas assez de cristal';
            }
        } else {
            $errorMsg['error']['metal'] = 'Pas assez de metal';
        }
        break;

    case 'Hangar de métal':

        //On recupere l'heure a laquelle on a cliquer pour le créer
        $timestamp =  mktime(date("G"), intval(date("i")), intval(date("s"), date("n"), date("j"), date("Y")));

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForHangarDeMetalPerLevel(1)) {
            //On créer le batiment
            $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForHangarDeMetalPerLevel(2), 0, 0, 0, 360, false, $timestamp, $_SESSION['User']['id']);
            //On update les ressource qu'on vien de dépenser
            $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForHangarDeMetalPerLevel(1), $arrayRessourceUser['cristal'],  0, $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        } else {
            $errorMsg['error']['metal'] = 'Pas assez de metal';
        }
        break;

    case 'Hangar de cristal':

        //On recupere l'heure a laquelle on a cliquer pour le créer
        $timestamp =  mktime(date("G"), intval(date("i")), intval(date("s"), date("n"), date("j"), date("Y")));

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForHangarDeCristalPerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForHangarDeCristalPerLevel(1)) {
                //On créer le batiment
                $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForHangarDeCristalPerLevel(2), costCristalForHangarDeCristalPerLevel(2), 0, 0, 360, false, $timestamp, $_SESSION['User']['id']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForHangarDeCristalPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForHangarDeCristalPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
            } else {
                $errorMsg['error']['cristal'] = 'Pas assez de cristal';
            }
        } else {
            $errorMsg['error']['metal'] = 'Pas assez de metal';
        }
        break;

    case 'Réservoir de deutérium':

        //On recupere l'heure a laquelle on a cliquer pour le créer
        $timestamp =  mktime(date("G"), intval(date("i")), intval(date("s"), date("n"), date("j"), date("Y")));

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForHangarDeDeutPerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForHangarDeDeutPerLevel(1)) {
                //On créer le batiment
                $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForHangarDeDeutPerLevel(2), costCristalForHangarDeDeutPerLevel(2), 0, 0, 360, false, $timestamp, $_SESSION['User']['id']);
                //On update les ressource qu'on vien de dépenser
                $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForHangarDeDeutPerLevel(1), $arrayRessourceUser['cristal'],  costCristalForHangarDeDeutPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
            } else {
                $errorMsg['error']['cristal'] = 'Pas assez de cristal';
            }
        } else {
            $errorMsg['error']['metal'] = 'Pas assez de metal';
        }
        break;

    case 'Laboratoire de recherche':

        //On recupere l'heure a laquelle on a cliquer pour le créer
        $timestamp =  mktime(date("G"), intval(date("i")), intval(date("s"), date("n"), date("j"), date("Y")));

        //On determine si on assez de ressource pour pouvoir construire le batiment
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);

        if ($arrayRessourceUser['metal'] >=  costMetalForLaboDeRecherchePerLevel(1)) {
            if ($arrayRessourceUser['cristal'] >= costCristalForLaboDeRecherchePerLevel(1)) {
                if ($arrayRessourceUser['deuterium'] >= costDeuteriumForLaboDeRecherchePerLevel(1)) {
                    //On créer le batiment
                    $buildingsObj->createBuildingLevel1($_POST['buildingName'], 1, costMetalForLaboDeRecherchePerLevel(2), costCristalForLaboDeRecherchePerLevel(2), costDeuteriumForLaboDeRecherchePerLevel(2), 0, 360, false, $timestamp, $_SESSION['User']['id']);
                    //On update les ressource qu'on vien de dépenser
                    $planetObj->updateRessourceAfterCreate($arrayRessourceUser['metal'], costMetalForLaboDeRecherchePerLevel(1), $arrayRessourceUser['cristal'],  costCristalForLaboDeRecherchePerLevel(1), $arrayRessourceUser['deuterium'], costDeuteriumForLaboDeRecherchePerLevel(1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
                } else {
                    $errorMsg['error']['deuterium'] = 'Pas assez de deuterium';
                }
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
