<?php

// Mine de métal

function costMetalForMineDeMetalPerLevel(int $level): int
{
    $formule = 60 * pow(1.5, $level - 1);
    return (int) $formule;
}

function costCristalForMineDeMetalPerLevel(int $level): int
{
    $formule = 15 * pow(1.5, $level - 1);
    return (int) $formule;
}

function costEnergyForMineDeMetalPerLevel(int $level): int
{
    $formule = 10 * $level * pow(1.1, $level);
    return (int) $formule;
}

// Mine de cristal

function costMetalForMineDeCristalPerLevel(int $level): int
{
    $formule = 48 * pow(1.6, $level - 1);
    return (int) $formule;
}

function costCristalForMineDeCristalPerLevel(int $level): int
{
    $formule = 24 * pow(1.6, $level - 1);
    return (int) $formule;
}

function costEnergyForMineDeCristalPerLevel(int $level): int
{
    $formule = 10 * $level * pow(1.1, $level);
    return (int) $formule;
}

// Synthétiseur de deutérium

function costMetalForDeuteriumPerLevel(int $level): int
{
    $formule = 225 * pow(1.5, $level - 1);
    return (int) $formule;
}

function costCristalForDeuteriumPerLevel(int $level): int
{
    $formule = 75 * pow(1.5, $level - 1);
    return (int) $formule;
}

function costEnergyForDeuteriumPerLevel(int $level): int
{
    $formule = 20 * $level * pow(1.1, $level);
    return (int) $formule;
}

// Centrale électrique solaire

function costMetalForCentralSolairePerLevel(int $level): int
{
    $formule = 75 * pow(1.5, $level - 1);
    return (int) $formule;
}

function costCristalForCentralSolairePerLevel(int $level): int
{
    $formule = 30 * pow(1.5, $level - 1);
    return (int) $formule;
}

function costEnergyForCentralSolairePerLevel(int $level): int
{
    $formule = 20 * $level * pow(1.1, $level);
    return (int) $formule;
}

// Usine de robots

function costMetalForUsineDeRobotsPerLevel(int $level): int
{
    $formule = 400 * pow(2, $level - 1);
    return (int) $formule;
}

function costCristalForUsineDeRobotsPerLevel(int $level): int
{
    $formule = 120 * pow(2, $level - 1);
    return (int) $formule;
}

function costDeuteriumForUsineDeRobotsPerLevel(int $level): int
{
    $formule = 200 * pow(2, $level - 1);
    return (int) $formule;
}

// Usine de nanites

function costMetalForUsineDeNanitesPerLevel(int $level): int
{
    $formule = 1000000 * pow(2, $level - 1);
    return (int) $formule;
}

function costCristalForUsineDeNanitesPerLevel(int $level): int
{
    $formule = 500000 * pow(2, $level - 1);
    return (int) $formule;
}

function costDeuteriumForUsineDeNanitesPerLevel(int $level): int
{
    $formule = 100000 * pow(2, $level - 1);
    return (int) $formule;
}

// Chantier spatial

function costMetalForChantierSpatialPerLevel(int $level): int
{
    $formule = 400 * pow(2, $level - 1);
    return (int) $formule;
}

function costCristalForChantierSpatialPerLevel(int $level): int
{
    $formule = 200 * pow(2, $level - 1);
    return (int) $formule;
}

function costDeuteriumForChantierSpatialPerLevel(int $level): int
{
    $formule = 100 * pow(2, $level - 1);
    return (int) $formule;
}

// Hangar de métal

function costMetalForHangarDeMetalPerLevel(int $level): int
{
    $formule = 1000 * pow(2, $level - 1);
    return (int) $formule;
}

// Hangar de cristal

function costMetalForHangarDeCristalPerLevel(int $level): int
{
    $formule = 1000 * pow(2, $level - 1);
    return (int) $formule;
}

function costCristalForHangarDeCristalPerLevel(int $level): int
{
    $formule = 500 * pow(2, $level - 1);
    return (int) $formule;
}

// Réservoir de deutérium

function costMetalForHangarDeDeutPerLevel(int $level): int
{
    $formule = 1000 * pow(2, $level - 1);
    return (int) $formule;
}

function costCristalForHangarDeDeutPerLevel(int $level): int
{
    $formule = 1000 * pow(2, $level - 1);
    return (int) $formule;
}

// Laboratoire de recherche

function costMetalForLaboDeRecherchePerLevel(int $level): int
{
    $formule = 400 * pow(2, $level - 1);
    return (int) $formule;
}

function costCristalForLaboDeRecherchePerLevel(int $level): int
{
    $formule = 200 * pow(2, $level - 1);
    return (int) $formule;
}

function costDeuteriumForLaboDeRecherchePerLevel(int $level): int
{
    $formule = 100 * pow(2, $level - 1);
    return (int) $formule;
}

// Temps de construction

function timeBuiltForBuilding($metal, $cristal, $robots, $nanites)
{
    $result = (($metal + $cristal) / 2500) * (1 / (1 + $robots)) * pow(0.5, $nanites);
    //On transforme le resultat en seconde
    return ceil($result * 3600);
}

//Affichage du temps de construction

function displayTimeBuilt($metal, $cristal, $robots, $nanites)
{
    $s = timeBuiltForBuilding($metal, $cristal, $robots, $nanites);
    $m = $s / 60;
    $h = $m / 60;
    $d = $h / 24;

    $s_remaining = floor(timeBuiltForBuilding($metal, $cristal, $robots, $nanites) % 60);
    $m_remaining = floor($m % 60);
    $h_remaining = floor($h % 24);
    $d_remaining = floor($d);

    if ($d_remaining == 0 && $h_remaining == 0 && $m_remaining == 0) {
        return $s_remaining . ' secondes';
    } elseif ($d_remaining == 0 && $h_remaining == 0) {
        if($s_remaining == 0){
            return $m_remaining . ' minutes ';
        } else {
            return $m_remaining . ' minutes ' . $s_remaining . ' secondes';
        }
    } elseif ($d_remaining == 0) {
        if ($s_remaining == 0 && $m_remaining == 0) {
            return $h_remaining . ' heures ';
        } elseif ($s_remaining == 0) {
            return $h_remaining . ' heures ' . $m_remaining . ' minutes ';
        } else {
            return $h_remaining . ' heures ' . $m_remaining . ' minutes ' . $s_remaining . ' secondes';
        }
    } else {
        if ($s_remaining == 0 && $m_remaining == 0 && $h_remaining == 0) {
            return $d_remaining . ' jours';
        } elseif ($s_remaining == 0 && $m_remaining == 0) {
            return $d_remaining . ' jours ' . $h_remaining . ' heures ';
        } elseif ($s_remaining == 0) {
            return $d_remaining . ' jours ' . $h_remaining . ' heures ' . $m_remaining . ' minutes ';
        } else {
            return $d_remaining . ' jours ' . $h_remaining . ' heures ' . $m_remaining . ' minutes ' . $s_remaining . ' secondes';
        }
    }



}
