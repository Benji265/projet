<?php

if ($_POST['name'] == 'Mine de métal') {
    if ($_POST['level'] > 1) {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction
        $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForMineDeMetalPerLevel($_POST['level']), costCristalForMineDeMetalPerLevel($_POST['level']), 0, costEnergyForMineDeMetalPerLevel($_POST['level']), $_SESSION['User']['id'], $_POST['name']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForMineDeMetalPerLevel($_POST['level']), $arrayRessourceUser['cristal'], costCristalForMineDeMetalPerLevel($_POST['level']), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForMineDeMetalPerLevel($_POST['level']), $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    } else {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction et on le detruit de la bdd
        $buildingsObj->deleteBuilding($_POST['name'], $_SESSION['User']['id']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForMineDeMetalPerLevel(1), $arrayRessourceUser['cristal'], costCristalForMineDeMetalPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForMineDeMetalPerLevel(1), $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    }
}

if ($_POST['name'] == 'Mine de cristal') {
    if ($_POST['level'] > 1) {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction
        $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForMineDeCristalPerLevel($_POST['level']), costCristalForMineDeCristalPerLevel($_POST['level']), 0, costEnergyForMineDeCristalPerLevel($_POST['level']), $_SESSION['User']['id'], $_POST['name']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForMineDeCristalPerLevel($_POST['level']), $arrayRessourceUser['cristal'], costCristalForMineDeCristalPerLevel($_POST['level']), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForMineDeCristalPerLevel($_POST['level']), $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    } else {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction et on le detruit de la bdd
        $buildingsObj->deleteBuilding($_POST['name'], $_SESSION['User']['id']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForMineDeCristalPerLevel(1), $arrayRessourceUser['cristal'], costCristalForMineDeCristalPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForMineDeCristalPerLevel(1), $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    }
}

if ($_POST['name'] == 'Synthétiseur de deutérium') {
    if ($_POST['level'] > 1) {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction
        $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForDeuteriumPerLevel($_POST['level']), costCristalForDeuteriumPerLevel($_POST['level']), 0, costEnergyForDeuteriumPerLevel($_POST['level']), $_SESSION['User']['id'], $_POST['name']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForDeuteriumPerLevel($_POST['level']), $arrayRessourceUser['cristal'], costCristalForDeuteriumPerLevel($_POST['level']), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForDeuteriumPerLevel($_POST['level']), $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    } else {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction et on le detruit de la bdd
        $buildingsObj->deleteBuilding($_POST['name'], $_SESSION['User']['id']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForDeuteriumPerLevel(1), $arrayRessourceUser['cristal'], costCristalForDeuteriumPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForDeuteriumPerLevel(1), $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    }
}

if ($_POST['name'] == 'Centrale électrique solaire') {
    if ($_POST['level'] > 1) {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction
        $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForCentralSolairePerLevel($_POST['level']), costCristalForCentralSolairePerLevel($_POST['level']), 0, costEnergyForCentralSolairePerLevel($_POST['level']), $_SESSION['User']['id'], $_POST['name']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancelCentral($arrayRessourceUser['metal'], costMetalForCentralSolairePerLevel($_POST['level']), $arrayRessourceUser['cristal'], costCristalForCentralSolairePerLevel($_POST['level']), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForCentralSolairePerLevel($_POST['level']), $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    } else {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction et on le detruit de la bdd
        $buildingsObj->deleteBuilding($_POST['name'], $_SESSION['User']['id']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancelCentral($arrayRessourceUser['metal'], costMetalForCentralSolairePerLevel(1), $arrayRessourceUser['cristal'], costCristalForCentralSolairePerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForCentralSolairePerLevel(1), $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    }
}

if ($_POST['name'] == 'Usine de robots') {
    if ($_POST['level'] > 1) {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction
        $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForUsineDeRobotsPerLevel($_POST['level']), costCristalForUsineDeRobotsPerLevel($_POST['level']), costDeuteriumForUsineDeRobotsPerLevel($_POST['level']), 0, $_SESSION['User']['id'], $_POST['name']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForUsineDeRobotsPerLevel($_POST['level']), $arrayRessourceUser['cristal'], costCristalForUsineDeRobotsPerLevel($_POST['level']), $arrayRessourceUser['deuterium'], costDeuteriumForUsineDeRobotsPerLevel($_POST['level']), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    } else {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction et on le detruit de la bdd
        $buildingsObj->deleteBuilding($_POST['name'], $_SESSION['User']['id']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForUsineDeRobotsPerLevel(1), $arrayRessourceUser['cristal'], costCristalForUsineDeRobotsPerLevel(1), $arrayRessourceUser['deuterium'], costDeuteriumForUsineDeRobotsPerLevel(1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    }
}

if ($_POST['name'] == 'Usine de nanites') {
    if ($_POST['level'] > 1) {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction
        $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForUsineDeNanitesPerLevel($_POST['level']), costCristalForUsineDeNanitesPerLevel($_POST['level']), costDeuteriumForUsineDeNanitesPerLevel($_POST['level']), 0, $_SESSION['User']['id'], $_POST['name']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForUsineDeNanitesPerLevel($_POST['level']), $arrayRessourceUser['cristal'], costCristalForUsineDeNanitesPerLevel($_POST['level']), $arrayRessourceUser['deuterium'], costDeuteriumForUsineDeNanitesPerLevel($_POST['level']), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    } else {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction et on le detruit de la bdd
        $buildingsObj->deleteBuilding($_POST['name'], $_SESSION['User']['id']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForUsineDeNanitesPerLevel(1), $arrayRessourceUser['cristal'], costCristalForUsineDeNanitesPerLevel(1), $arrayRessourceUser['deuterium'], costDeuteriumForUsineDeNanitesPerLevel(1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    }
}

if ($_POST['name'] == 'Chantier spatial') {
    if ($_POST['level'] > 1) {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction
        $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForChantierSpatialPerLevel($_POST['level']), costCristalForChantierSpatialPerLevel($_POST['level']), costDeuteriumForChantierSpatialPerLevel($_POST['level']), 0, $_SESSION['User']['id'], $_POST['name']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForChantierSpatialPerLevel($_POST['level']), $arrayRessourceUser['cristal'], costCristalForChantierSpatialPerLevel($_POST['level']), $arrayRessourceUser['deuterium'], costDeuteriumForChantierSpatialPerLevel($_POST['level']), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    } else {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction et on le detruit de la bdd
        $buildingsObj->deleteBuilding($_POST['name'], $_SESSION['User']['id']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForChantierSpatialPerLevel(1), $arrayRessourceUser['cristal'], costCristalForChantierSpatialPerLevel(1), $arrayRessourceUser['deuterium'], costDeuteriumForChantierSpatialPerLevel(1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    }
}

if ($_POST['name'] == 'Hangar de métal') {
    if ($_POST['level'] > 1) {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction
        $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForHangarDeMetalPerLevel($_POST['level']), 0, 0, 0, $_SESSION['User']['id'], $_POST['name']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForHangarDeMetalPerLevel($_POST['level']), $arrayRessourceUser['cristal'], 0, $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    } else {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction et on le detruit de la bdd
        $buildingsObj->deleteBuilding($_POST['name'], $_SESSION['User']['id']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForHangarDeMetalPerLevel(1), $arrayRessourceUser['cristal'], 0, $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    }
}

if ($_POST['name'] == 'Hangar de cristal') {
    if ($_POST['level'] > 1) {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction
        $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForHangarDeCristalPerLevel($_POST['level']), costCristalForHangarDeCristalPerLevel($_POST['level']), 0, 0, $_SESSION['User']['id'], $_POST['name']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForHangarDeCristalPerLevel($_POST['level']), $arrayRessourceUser['cristal'], costCristalForHangarDeCristalPerLevel($_POST['level']), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    } else {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction et on le detruit de la bdd
        $buildingsObj->deleteBuilding($_POST['name'], $_SESSION['User']['id']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForHangarDeCristalPerLevel(1), $arrayRessourceUser['cristal'], costCristalForHangarDeCristalPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    }
}

if ($_POST['name'] == 'Réservoir de deutérium') {
    if ($_POST['level'] > 1) {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction
        $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForHangarDeDeutPerLevel($_POST['level']), costCristalForHangarDeDeutPerLevel($_POST['level']), 0, 0, $_SESSION['User']['id'], $_POST['name']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForHangarDeDeutPerLevel($_POST['level']), $arrayRessourceUser['cristal'], costCristalForHangarDeDeutPerLevel($_POST['level']), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    } else {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction et on le detruit de la bdd
        $buildingsObj->deleteBuilding($_POST['name'], $_SESSION['User']['id']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForHangarDeDeutPerLevel(1), $arrayRessourceUser['cristal'], costCristalForHangarDeDeutPerLevel(1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    }
}

if ($_POST['name'] == 'Laboratoire de recherche') {
    if ($_POST['level'] > 1) {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction
        $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForLaboDeRecherchePerLevel($_POST['level']), costCristalForLaboDeRecherchePerLevel($_POST['level']), costDeuteriumForLaboDeRecherchePerLevel($_POST['level']), 0, $_SESSION['User']['id'], $_POST['name']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForLaboDeRecherchePerLevel($_POST['level']), $arrayRessourceUser['cristal'], costCristalForLaboDeRecherchePerLevel($_POST['level']), $arrayRessourceUser['deuterium'], costDeuteriumForLaboDeRecherchePerLevel($_POST['level']), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    } else {
        //On recupere les infos de la planete de l'utilisateur
        $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
        //On annule la construction et on le detruit de la bdd
        $buildingsObj->deleteBuilding($_POST['name'], $_SESSION['User']['id']);
        //On redonne les ressource depenser
        $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForLaboDeRecherchePerLevel(1), $arrayRessourceUser['cristal'], costCristalForLaboDeRecherchePerLevel(1), $arrayRessourceUser['deuterium'], costDeuteriumForLaboDeRecherchePerLevel(1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
        //On refresh la page
        $createBuilding = true;
    }
}
