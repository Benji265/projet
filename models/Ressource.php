<?php

class Ressource extends Database
{   
    /**
     * Methode qui permet de recuperer les ressource presente sur la planete
     *
     * @param integer $id
     * @return array
     */
    public function getRessourceForOneUser(int $id): array
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('SELECT `metal`, `cristal`, `deuterium`, `energy` 
                              FROM `Planets` 
                              WHERE `Users_id` = :id');

        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetch();
        return $result;
    }
}
