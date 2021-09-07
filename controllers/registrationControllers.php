<?php

require_once '../models/Form.php';

$regexPseudo = "/^[A-Za-z\é\è\ê\-]+$/";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['registration'])) {
        //On instancie notre objets Form pour faire nos vérification
        $formObj = new Form();
        //On cree notre tableaux qui contiendra nos message d'erreur
        $errorMsg = array();
        //On cree notre compteur pour savoir si tout notre formulaire est bon
        $compteurValidation = 0;

        //On check le pseudo
        $errorMsg['pseudo'] = $formObj->checkPseudo($_POST, 'pseudo', $regexPseudo);

        //On check l'email
        $errorMsg['email'] = $formObj->checkEmail($_POST, 'email');

        //On check les passwords
        $errorMsg['password'] = $formObj->checkPassword($_POST, 'password');
        $errorMsg['confirmPassword'] = $formObj->checkPassword($_POST, 'confirmPassword');

        //On regarde si les password sont pas identique
        if ($_POST['password'] != $_POST['confirmPassword']) {
            $errorMsg['password'] = 'Erreur dans les mot de passe';
        }

        //On check le captcha
        if (!empty($_POST['g-recaptcha-response'])) {
            $captcha = $formObj->checkCaptcha('6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe', $_POST['g-recaptcha-response']);
        } else {
            $errorMsg['captcha'] = 'Veuillez valider le captcha';
        }

        //On regarde si notre formulaire est bon
        foreach ($errorMsg as $value) {
            if ($value == 1) {
                $compteurValidation++;
            }
        }

        //On verifie notre compteur et notre captcha pour savoir si on passe a la suite
        if ($compteurValidation == 4 && $captcha['success']) {
           
        }
    }
}
