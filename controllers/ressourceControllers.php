<?php

require_once '../models/Database.php';
require_once '../models/Ressource.php';

$ressourceObj = new Ressource();
$arrayRessource = $ressourceObj->getRessourceForOneUser($_SESSION['User']['id']);
