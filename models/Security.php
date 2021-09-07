<?php

class Security
{   
    /**
     * Methode qui permet de sécuriser les données reçus dans une variable
     *
     * @param string $données
     * @return string
     */
    public function getSafePost(string $données): string
    {
        $result = htmlspecialchars(stripslashes(trim($données)));
        return $result;
    }
}
