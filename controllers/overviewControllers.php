<?php

require_once '../models/Database.php';
require_once '../models/Planets.php';

$planetObj = new Planets();
$arrayInfosPlanet = $planetObj->getInfosPlanetForOneUser($_SESSION['User']['id']);