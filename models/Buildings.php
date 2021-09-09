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
    public function createBuildingLevel1(string $name, int $level, int $metalPrice, int $cristalPrice, int $deuteriumPrice, int $energyCost, int $userId): void
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('INSERT INTO `Building` (`name`, `level`, `metal_price`, `cristal_price`, `deuterium_price`, `energy_cost`, `Users_id`) 
                            VALUES (:name, :level, :metalPrice, :cristalPrice, :deuteriumPrice, :energyCost, :userId)');
        
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':level', $level, PDO::PARAM_INT);
        $req->bindValue(':metalPrice', $metalPrice, PDO::PARAM_INT);
        $req->bindValue(':cristalPrice', $cristalPrice, PDO::PARAM_INT);
        $req->bindValue(':deuteriumPrice', $deuteriumPrice, PDO::PARAM_INT);
        $req->bindValue(':energyCost', $energyCost, PDO::PARAM_INT);
        $req->bindValue(':userId', $userId, PDO::PARAM_INT);

        $req->execute();
    }
}
