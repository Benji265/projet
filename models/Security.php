<?php

class Security
{
    public function getSafePost($post)
    {
        $result = htmlspecialchars(stripslashes(trim($post)));
        return $result;
    }
}
