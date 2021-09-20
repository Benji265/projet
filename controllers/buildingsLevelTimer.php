<?php

if ($buildings['name'] == 'Mine de métal') {
    $temp = $buildings['timestamp'] + timeBuiltForBuilding(costMetalForMineDeMetalPerLevel($buildings['level']), costCristalForMineDeMetalPerLevel($buildings['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']);
}

if ($buildings['name'] == 'Mine de cristal') {
     $temp = $buildings['timestamp'] + timeBuiltForBuilding(costMetalForMineDeCristalPerLevel($buildings['level']), costCristalForMineDeCristalPerLevel($buildings['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']);
}

if ($buildings['name'] == 'Synthétiseur de deutérium') {
    $temp = $buildings['timestamp'] + timeBuiltForBuilding(costMetalForDeuteriumPerLevel($buildings['level']), costCristalForDeuteriumPerLevel($buildings['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']);
}

if ($buildings['name'] == 'Centrale électrique solaire') {
    $temp = $buildings['timestamp'] + timeBuiltForBuilding(costMetalForCentralSolairePerLevel($buildings['level']), costCristalForCentralSolairePerLevel($buildings['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']);
}

if ($buildings['name'] == 'Usine de robots') {
    $temp = $buildings['timestamp'] + timeBuiltForBuilding(costMetalForUsineDeRobotsPerLevel($buildings['level']), costCristalForUsineDeRobotsPerLevel($buildings['level']), $infosUsineRobots[0]['level'] == 1 && $infosUsineRobots[0]['built'] == 0 ? 0 : ($infosUsineRobots[0]['level'] > 1 && $infosUsineRobots[0]['built'] == 0 ? $infosUsineRobots[0]['level'] - 1 : $infosUsineRobots[0]['level']), $infosUsineNanites[0]['level']);
}

if ($buildings['name'] == 'Usine de nanites') {
    $temp = $buildings['timestamp'] + timeBuiltForBuilding(costMetalForUsineDeNanitesPerLevel($buildings['level']), costCristalForUsineDeNanitesPerLevel($buildings['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']);
}

if ($buildings['name'] == 'Chantier spatial') {
    $temp = $buildings['timestamp'] + timeBuiltForBuilding(costMetalForChantierSpatialPerLevel($buildings['level']), costCristalForChantierSpatialPerLevel($buildings['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']);
}

if ($buildings['name'] == 'Hangar de métal') {
    $temp = $buildings['timestamp'] + timeBuiltForBuilding(costMetalForHangarDeMetalPerLevel($buildings['level']), 0, $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']);
}

if ($buildings['name'] == 'Hangar de cristal') {
    $temp = $buildings['timestamp'] + timeBuiltForBuilding(costMetalForHangarDeCristalPerLevel($buildings['level']), costCristalForHangarDeCristalPerLevel($buildings['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']);
}

if ($buildings['name'] == 'Réservoir de deutérium') {
    $temp = $buildings['timestamp'] + timeBuiltForBuilding(costMetalForHangarDeDeutPerLevel($buildings['level']), costCristalForHangarDeDeutPerLevel($buildings['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']);
}

if ($buildings['name'] == 'Laboratoire de recherche') {
    $temp = $buildings['timestamp'] + timeBuiltForBuilding(costMetalForLaboDeRecherchePerLevel($buildings['level']), costCristalForLaboDeRecherchePerLevel($buildings['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']);
}
