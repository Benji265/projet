<?php

class Form
{
    public function checkPseudo(array $arr, string $name, string $regex): string
    {
        if (empty($arr[$name])) {
            $errorMsg = 'Champ Obligatoire';
            return $errorMsg;
        } elseif (!preg_match($regex, $arr[$name])) {
            $errorMsg = 'Format Invalide';
            return $errorMsg;
        }

        return true;
    }

    public function checkEmail(array $arr, string $name): string
    {
        if (empty($arr[$name])) {
            $errorMsg = 'Champ Obligatoire';
            return $errorMsg;
        } elseif (!filter_var($arr[$name], FILTER_VALIDATE_EMAIL)) {
            $errorMsg = 'Format Invalide';
            return $errorMsg;
        }

        return true;
    }

    public function checkPassword(array $arr, string $nameChamp): string
    {
        if (empty($arr[$nameChamp])) {
            $errorMsg = 'Champ Obligatoire';
            return $errorMsg;
        }

        return true;
    }

    public function checkCaptcha(string $secret, string $response): array
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $response;
        $response = file_get_contents($url);
        $responseKeys = json_decode($response, true);
        return $responseKeys;
    }
}
