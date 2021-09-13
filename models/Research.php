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

        $req = $bdd->prepare('SELECT * FROM `Research` WHERE `Users_id` = :id');

        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }

    public function getInfosForOneResearch(string $name, int $userId): array
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('SELECT * FROM `Research` WHERE `name` = :name AND `Users_id` = :userId');

        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':userId', $userId, PDO::PARAM_STR);

        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }
}
