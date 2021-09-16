<?php

if ($_POST['name'] == 'Mine de métal') {
    //On recupere les infos de la planete de l'utilisateur
    $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
    //On annule la construction
    $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForMineDeMetalPerLevel($_POST['level']), costCristalForMineDeMetalPerLevel($_POST['level']), 0, costEnergyForMineDeMetalPerLevel($_POST['level']), $_SESSION['User']['id'], $_POST['name']);
    //On redonne les ressource depenser
    $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForMineDeMetalPerLevel($_POST['level'] - 1), $arrayRessourceUser['cristal'], costCristalForMineDeMetalPerLevel($_POST['level'] - 1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForMineDeMetalPerLevel($_POST['level'] - 1), $_SESSION['User']['id']);
}

if ($_POST['name'] == 'Mine de cristal') {
    //On recupere les infos de la planete de l'utilisateur
    $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
    //On annule la construction
    $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForMineDeCristalPerLevel($_POST['level']), costCristalForMineDeCristalPerLevel($_POST['level']), 0, costEnergyForMineDeCristalPerLevel($_POST['level']), $_SESSION['User']['id'], $_POST['name']);
    //On redonne les ressource depenser
    $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForMineDeCristalPerLevel($_POST['level'] - 1), $arrayRessourceUser['cristal'], costCristalForMineDeCristalPerLevel($_POST['level'] - 1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForMineDeCristalPerLevel($_POST['level'] - 1), $_SESSION['User']['id']);
}

if ($_POST['name'] == 'Synthétiseur de deutérium') {
    //On recupere les infos de la planete de l'utilisateur
    $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
    //On annule la construction
    $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForDeuteriumPerLevel($_POST['level']), costCristalForDeuteriumPerLevel($_POST['level']), 0, costEnergyForDeuteriumPerLevel($_POST['level']), $_SESSION['User']['id'], $_POST['name']);
    //On redonne les ressource depenser
    $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForDeuteriumPerLevel($_POST['level'] - 1), $arrayRessourceUser['cristal'], costCristalForDeuteriumPerLevel($_POST['level'] - 1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForDeuteriumPerLevel($_POST['level'] - 1), $_SESSION['User']['id']);
}

if ($_POST['name'] == 'Centrale électrique solaire') {
    //On recupere les infos de la planete de l'utilisateur
    $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
    //On annule la construction
    $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForCentralSolairePerLevel($_POST['level']), costCristalForCentralSolairePerLevel($_POST['level']), 0, costEnergyForCentralSolairePerLevel($_POST['level']), $_SESSION['User']['id'], $_POST['name']);
    //On redonne les ressource depenser
    $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForCentralSolairePerLevel($_POST['level'] - 1), $arrayRessourceUser['cristal'], costCristalForCentralSolairePerLevel($_POST['level'] - 1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], costEnergyForCentralSolairePerLevel($_POST['level'] - 1), $_SESSION['User']['id']);
}

if ($_POST['name'] == 'Usine de robots') {
    //On recupere les infos de la planete de l'utilisateur
    $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
    //On annule la construction
    $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForUsineDeRobotsPerLevel($_POST['level']), costCristalForUsineDeRobotsPerLevel($_POST['level']), costDeuteriumForUsineDeRobotsPerLevel($_POST['level']), 0, $_SESSION['User']['id'], $_POST['name']);
    //On redonne les ressource depenser
    $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForUsineDeRobotsPerLevel($_POST['level'] - 1), $arrayRessourceUser['cristal'], costCristalForUsineDeRobotsPerLevel($_POST['level'] - 1), $arrayRessourceUser['deuterium'], costDeuteriumForUsineDeRobotsPerLevel($_POST['level'] - 1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
}

if ($_POST['name'] == 'Usine de robots') {
    //On recupere les infos de la planete de l'utilisateur
    $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
    //On annule la construction
    $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForUsineDeNanitesPerLevel($_POST['level']), costCristalForUsineDeNanitesPerLevel($_POST['level']), costDeuteriumForUsineDeNanitesPerLevel($_POST['level']), 0, $_SESSION['User']['id'], $_POST['name']);
    //On redonne les ressource depenser
    $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForUsineDeNanitesPerLevel($_POST['level'] - 1), $arrayRessourceUser['cristal'], costCristalForUsineDeNanitesPerLevel($_POST['level'] - 1), $arrayRessourceUser['deuterium'], costDeuteriumForUsineDeNanitesPerLevel($_POST['level'] - 1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
}

if ($_POST['name'] == 'Chantier spatial') {
    //On recupere les infos de la planete de l'utilisateur
    $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
    //On annule la construction
    $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForChantierSpatialPerLevel($_POST['level']), costCristalForChantierSpatialPerLevel($_POST['level']), costDeuteriumForChantierSpatialPerLevel($_POST['level']), 0, $_SESSION['User']['id'], $_POST['name']);
    //On redonne les ressource depenser
    $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForChantierSpatialPerLevel($_POST['level'] - 1), $arrayRessourceUser['cristal'], costCristalForChantierSpatialPerLevel($_POST['level'] - 1), $arrayRessourceUser['deuterium'], costDeuteriumForChantierSpatialPerLevel($_POST['level'] - 1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
}

if ($_POST['name'] == 'Hangar de métal') {
    //On recupere les infos de la planete de l'utilisateur
    $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
    //On annule la construction
    $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForHangarDeMetalPerLevel($_POST['level']), 0, 0, 0, $_SESSION['User']['id'], $_POST['name']);
    //On redonne les ressource depenser
    $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForHangarDeMetalPerLevel($_POST['level'] - 1), $arrayRessourceUser['cristal'], 0, $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
}

if ($_POST['name'] == 'Hangar de cristal') {
    //On recupere les infos de la planete de l'utilisateur
    $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
    //On annule la construction
    $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForHangarDeCristalPerLevel($_POST['level']), costCristalForHangarDeCristalPerLevel($_POST['level']), 0, 0, $_SESSION['User']['id'], $_POST['name']);
    //On redonne les ressource depenser
    $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForHangarDeCristalPerLevel($_POST['level'] - 1), $arrayRessourceUser['cristal'], costCristalForHangarDeCristalPerLevel($_POST['level'] - 1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
}

if ($_POST['name'] == 'Réservoir de deutérium') {
    //On recupere les infos de la planete de l'utilisateur
    $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
    //On annule la construction
    $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForHangarDeDeutPerLevel($_POST['level']), costCristalForHangarDeDeutPerLevel($_POST['level']), 0, 0, $_SESSION['User']['id'], $_POST['name']);
    //On redonne les ressource depenser
    $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForHangarDeDeutPerLevel($_POST['level'] - 1), $arrayRessourceUser['cristal'], costCristalForHangarDeDeutPerLevel($_POST['level'] - 1), $arrayRessourceUser['deuterium'], 0, $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
}

if ($_POST['name'] == 'Laboratoire de recherche') {
    //On recupere les infos de la planete de l'utilisateur
    $arrayRessourceUser = $planetObj->getInfosRessourceForOneUser($_SESSION['User']['id']);
    //On annule la construction
    $buildingsObj->cancelBuilding(($_POST['level'] - 1), costMetalForLaboDeRecherchePerLevel($_POST['level']), costCristalForLaboDeRecherchePerLevel($_POST['level']), costDeuteriumForLaboDeRecherchePerLevel($_POST['level']), 0, $_SESSION['User']['id'], $_POST['name']);
    //On redonne les ressource depenser
    $planetObj->updateRessourceAfterCancel($arrayRessourceUser['metal'], costMetalForLaboDeRecherchePerLevel($_POST['level'] - 1), $arrayRessourceUser['cristal'], costCristalForLaboDeRecherchePerLevel($_POST['level'] - 1), $arrayRessourceUser['deuterium'], costDeuteriumForLaboDeRecherchePerLevel($_POST['level'] - 1), $arrayRessourceUser['energy'], 0, $_SESSION['User']['id']);
}