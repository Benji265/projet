<?php

require_once '../models/Form.php';

$regexPseudo = "/^[A-Za-z\é\è\ê\-]+$/";

$valideUser = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['registration'])) {
        $formObj = new Form();

        $errorMsg = array();

        if ($formObj->checkPseudo($_POST, 'pseudo', $regexPseudo)) {
            $errorMsg['pseudo'] = $formObj->checkPseudo($_POST, 'pseudo', $regexPseudo);
        }

        if ($formObj->checkEmail($_POST, 'email')) {
            $errorMsg['email'] = $formObj->checkEmail($_POST, 'email');
        }

        if ($formObj->checkPassword($_POST, 'password')) {
            $errorMsg['password'] = $formObj->checkEmail($_POST, 'email');
        }

        if ($formObj->checkPassword($_POST, 'confirmPassword')) {
            $errorMsg['confirmPassword'] = $formObj->checkEmail($_POST, 'email');
        }
    }
}