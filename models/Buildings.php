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

        $req = $bdd->prepare('SELECT * FROM `Building` WHERE `Users_id` = :id');

        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }

    /**
     * Methode qui permet de recuperer les infos d'un batiment en fonction de son nom et son l'id de l'utilisateur
     *
     * @param string $name
     * @return array
     */
    public function getInfosOnOneBuilding(string $name, int $id): array
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('SELECT * FROM `Building` WHERE `name` = :name AND `Users_id` = :id');

        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }
    /**
     * Methode qui permet d'ajouter a la bdd la creation du 1er level d'un batiment
     *
     * @param string $name
     * @param integer $level
     * @param integer $metalPrice
     * @param integer $cristalPrice
     * @param integer $deuteriumPrice
     * @param integer $energyCost
     * @param boolean $built
     * @param integer $timestamp
     * @param integer $userId
     * @return void
     */
    public function createBuildingLevel1(string $name, int $level, int $metalPrice, int $cristalPrice, int $deuteriumPrice, int $energyCost, int $timeBuilt, bool $built, int $timestamp, int $userId): void
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('INSERT INTO `Building` (`name`, `level`, `metal_price`, `cristal_price`, `deuterium_price`, `energy_cost`, `built`, `time_built`, `timestamp`, `Users_id`) 
                            VALUES (:name, :level, :metalPrice, :cristalPrice, :deuteriumPrice, :energyCost, :built, :timeBuilt, :timestamp, :userId)');

        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':level', $level, PDO::PARAM_INT);
        $req->bindValue(':metalPrice', $metalPrice, PDO::PARAM_INT);
        $req->bindValue(':cristalPrice', $cristalPrice, PDO::PARAM_INT);
        $req->bindValue(':deuteriumPrice', $deuteriumPrice, PDO::PARAM_INT);
        $req->bindValue(':energyCost', $energyCost, PDO::PARAM_INT);
        $req->bindValue(':timeBuilt', $timeBuilt, PDO::PARAM_INT);
        $req->bindValue(':built', $built, PDO::PARAM_BOOL);
        $req->bindValue(':timestamp', $timestamp, PDO::PARAM_INT);
        $req->bindValue(':userId', $userId, PDO::PARAM_INT);

        $req->execute();
    }

    /**
     * Mehode qui valide la fin de la construction d'un batiment
     *
     * @param integer $id
     * @return void
     */
    public function finishCreateBuilding(int $id): void
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('UPDATE `Building` SET `built` = 1 WHERE `Building_id` = :id');

        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * Methode qui permet d'update un batiment
     *
     * @param integer $level
     * @param integer $metalPrice
     * @param integer $cristalPrice
     * @param integer $deuteriumPrice
     * @param integer $energyCost
     * @param integer $timeBuilt
     * @param integer $timestamp
     * @param integer $userId
     * @param string $name
     * @return void
     */
    public function updateBuilding(int $level, int $metalPrice, int $cristalPrice, int $deuteriumPrice, int $energyCost, int $timeBuilt, int $timestamp, int $userId, string $name): void
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('UPDATE `Building` SET `level` = :level ,
                                                    `metal_price` = :metalPrice,
                                                    `cristal_price` = :cristalPrice,
                                                    `deuterium_price` = :deuteriumPrice,
                                                    `energy_cost` = :energyCost,
                                                    `time_built` = :timeBuilt,
                                                    `built` = 0,
                                                    `timestamp` = :timestamp
                            WHERE `Users_id` = :userId AND `name` = :name');

        $req->bindValue(':level', $level, PDO::PARAM_INT);
        $req->bindValue(':metalPrice', $metalPrice, PDO::PARAM_INT);
        $req->bindValue(':cristalPrice', $cristalPrice, PDO::PARAM_INT);
        $req->bindValue(':deuteriumPrice', $deuteriumPrice, PDO::PARAM_INT);
        $req->bindValue(':energyCost', $energyCost, PDO::PARAM_INT);
        $req->bindValue(':timeBuilt', $timeBuilt, PDO::PARAM_INT);
        $req->bindValue(':timestamp', $timestamp, PDO::PARAM_INT);
        $req->bindValue(':userId', $userId, PDO::PARAM_INT);
        $req->bindValue(':name', $name, PDO::PARAM_STR);

        $req->execute();
    }

    /**
     * Methode qui permet de recuperer le nombre de batiment en construction
     *
     * @return int
     */
    public function countListBuilt(): array
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->query("SELECT COUNT(*) AS 'CountListBuilt' FROM `Building` WHERE `built` = 0");

        $req->execute();
        $result = $req->fetch();
        return $result;
    }

    /**
     * Methode qui permet d'annuler un batiment en cours de construction
     *
     * @param integer $level
     * @param integer $metalPrice
     * @param integer $cristalPrice
     * @param integer $deuteriumPrice
     * @param integer $energyCost
     * @param integer $userId
     * @param string $name
     * @return void
     */
    public function cancelBuilding(int $level, int $metalPrice, int $cristalPrice, int $deuteriumPrice, int $energyCost, int $userId, string $name): void
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('UPDATE `Building` SET `level` = :level,
                                                    `metal_price` = :metalPrice,
                                                    `cristal_price` = :cristalPrice,
                                                    `deuterium_price` = :deuteriumPrice,
                                                    `energy_cost` = :energyCost,
                                                    `built` = 1
                            WHERE `Users_id` = :userId AND `name` = :name');

        $req->bindValue(':level', $level, PDO::PARAM_INT);
        $req->bindValue(':metalPrice', $metalPrice, PDO::PARAM_INT);
        $req->bindValue(':cristalPrice', $cristalPrice, PDO::PARAM_INT);
        $req->bindValue(':deuteriumPrice', $deuteriumPrice, PDO::PARAM_INT);
        $req->bindValue(':energyCost', $energyCost, PDO::PARAM_INT);
        $req->bindValue(':userId', $userId, PDO::PARAM_INT);
        $req->bindValue(':name', $name, PDO::PARAM_STR);

        $req->execute();
    }

    /**
     * Methode qui permet de supprimer un batiments avec le nom et l'id de se batiment
     *
     * @param string $name
     * @param integer $id
     * @return void
     */
    public function deleteBuilding(string $name, int $id): void
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('DELETE FROM `Building` WHERE `name` = :name AND `Users_id` = :id');

        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }
}
