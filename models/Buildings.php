<?php

class Buildings extends Database
{
    /**
     * Methode qui permet de recuperer les infos des batiments créer par un utilisateur
     *
     * @param integer $id
     * @return array
     */
    public function getInfosBuildingForOneUser(int $id): array
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('SELECT `name`, `level`, `metal_price`, `cristal_price`, `deuterium_price`, `energy_cost`
                              FROM `Building` 
                              WHERE `Users_id` = :id');

        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }
}
