<?php

class Form
{
    public function checkPseudo(array $arr, string $nameChamp, string $regex): string
    {
        if (empty($arr[$nameChamp])) {
            return 'Champ Obligatoire';
        } elseif (!preg_match($regex, $arr[$nameChamp])) {
            return 'Format Invalide';
        }
    }

    public function checkEmail(array $arr, string $nameChamp): string
    {
        if (empty($arr[$nameChamp])) {
            return 'Champ Obligatoire';
        } elseif (!filter_var($arr[$nameChamp], FILTER_VALIDATE_EMAIL)) {
            return 'Format Invalide';
        }
    }

    public function checkPassword(array $arr, string $nameChamp): string
    {
        if (empty($arr[$nameChamp])) {
            return 'Champ Obligatoire';
        }
    }

    public function checkCaptcha(string $secret, string $response): array
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $response;
        $response = file_get_contents($url);
        $responseKeys = json_decode($response, true);
        return $responseKeys;
    }
}