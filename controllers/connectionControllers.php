<?php

session_start();

require_once '../models/Database.php';
require_once '../models/Users.php';
require_once '../models/Security.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['connection'])) {
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            $userObj = new Users();
            $arrayAllUsers = $userObj->getAllUsers();

            $securityObj = new Security();
            $login = $securityObj->getSafePost($_POST['login']);
            $password = $securityObj->getSafePost($_POST['password']);

            foreach ($arrayAllUsers as $value) {
                if ($value['pseudo'] == $login || $value['email'] == $login) {
                    $verifOk = true;
                    $passwordHash = $value['password'];
                    $name = $value['pseudo'];
                    $id = $value['Users_id'];
                    $authlevel = $value['authlevel'];
                    break;
                } else {
                    $verifOk = false;
                    $errorMsg['login'] = 'Login Invalide';
                }
            }

            if ($verifOk) {
                if (password_verify($password, $passwordHash)) {
                    $_SESSION['sessionStart'] = "Oui";
                    $_SESSION['User']['name'] = $name;
                    $_SESSION['User']['id'] = $id;
                    $_SESSION['User']['authlevel'] = $authlevel;
                    header('Location: ../views/overview.php');
                }
            }
        }
    }
}