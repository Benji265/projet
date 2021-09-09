<?php

class Research extends Database
{   
    /**
     * Methode qui permet de recuperer les infos des recherches créer par un utilisateur
     *
     * @param integer $id
     * @return array
     */
    public function getInfosResearchForOneUser(int $id): array
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('SELECT `name`, `level`, `metal_price`, `cristal_price`, `deuterium_price`
                              FROM `Research` 
                              WHERE `Users_id` = :id');

        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }
}
