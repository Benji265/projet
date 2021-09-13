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

// Synthétiseur de deutérium

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
    $ressource = 400;

    for ($i = 1; $i < $level; $i++) {
        $result = $ressource * 2;
        $ressource = $result;
    }

    return $ressource;
}

function costCristalForUsineDeRobotsPerLevel(int $level): int
{
    $ressource = 120;

    for ($i = 1; $i < $level; $i++) {
        $result = $ressource * 2;
        $ressource = $result;
    }

    return $ressource;
}

function costDeuteriumForUsineDeRobotsPerLevel(int $level): int
{
    $ressource = 200;

    for ($i = 1; $i < $level; $i++) {
        $result = $ressource * 2;
        $ressource = $result;
    }

    return $ressource;
}