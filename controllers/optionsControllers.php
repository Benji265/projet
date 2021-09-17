<?php

require_once '../models/Database.php';
require_once '../models/Users.php';
require_once '../models/Security.php';
require_once '../models/Planets.php';

$usersObj = new Users();
$arrayUser = $usersObj->getOneUser($_SESSION['User']['id']);

$validOption = 0;
$validModif = 0;
$validDelete = 0;
$deleteAccount = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['modifyUser'])) {

        $securityObj = new Security();
        $pseudo = $securityObj->getSafePost($_POST['pseudo']);
        $email = $securityObj->getSafePost($_POST['email']);
        $planets = $securityObj->getSafePost($_POST['planets']);

        $arrayAllUsers = $usersObj->getAllUsers();


        $errorMsg = [];
        //On parcours notre tableaux pour verifier que le pseudo et l'email choisi sont pas deja pris
        foreach ($arrayAllUsers as $value) {
            if ($pseudo == $value['pseudo']) {
                $errorMsg['pseudo'] = 'Pseudo déjà utilisé';
                break;
            } else {
                $errorMsg['pseudo'] = true;
            }
        }

        foreach ($arrayAllUsers as $value) {
            if ($email == $value['email']) {
                $errorMsg['email'] = 'Email déjà utilisé';
                break;
            } else {
                $errorMsg['email'] = true;
            }
        }

        if ($arrayUser['pseudo'] == $pseudo) {
            $errorMsg['pseudo'] = true;
        }

        if ($arrayUser['email'] == $email) {
            $errorMsg['email'] = true;
        }


        if ($errorMsg['pseudo'] == 1 && $errorMsg['email'] == 1) {
            $validOption = true;
            $_SESSION['Option']['pseudo'] = $pseudo;
            $_SESSION['Option']['email'] = $email;
            $_SESSION['Option']['planets'] = $planets;
            $_SESSION['Option']['delete'] = $_POST['delete'];
        }
    }

    if (isset($_POST['validModify'])) {
        $securityObj = new Security();
        $passwordOne = $securityObj->getSafePost($_POST['password']);
        $passwordTwo = $securityObj->getSafePost($_POST['confirmPassword']);

        $arrayAllUsers = $usersObj->getAllUsers();

        if ($passwordOne == $passwordTwo) {
            foreach ($arrayAllUsers as $value) {
                if (password_verify($passwordOne, $value['password'])) {
                    $errorMsg['password'] = true;
                    break;
                } else {
                    $errorMsg['password'] = 'Erreur de password';
                }
            }
        } else {
            $errorMsg['password'] = 'Erreur dans les mot de passe';
        }

        if ($errorMsg['password'] == 1) {
            if ($_SESSION['Option']['delete'] == 'on') {
                $validDelete = true;
            } else {
                $planetsObj = new Planets();
                $usersObj->updateOneUser($_SESSION['Option']['pseudo'], $_SESSION['Option']['email'], $_SESSION['User']['id']);
                $planetsObj->updateNamePlanets($_SESSION['Option']['planets'], $_SESSION['User']['id']);
                $validModif = true;
            }
        }
    }

    if (isset($_POST['deleteAccount'])) {
        $usersObj->deleteUser($_SESSION['User']['id']);
        $deleteAccount = true;
    }
}
