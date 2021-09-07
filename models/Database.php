<?php

class Database
{
    protected function connectDatabase()
    {
        try {
            $database = new PDO('mysql:host=localhost;dbname=Xnova;charset=utf8', 'root', 'root');
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $database;
        } catch (PDOException $error) {
            die('Erreur : ' . $error->getMessage());
        }
    }
}