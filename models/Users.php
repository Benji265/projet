<?php

class Users extends Database
{
    /**
     * Methode qui permet de créer un user et recupérer son id
     *
     * @param string $pseudo
     * @param string $email
     * @param string $password
     * @return int
     */
    public function createUser(string $pseudo, string $email, string $password): int
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('INSERT INTO `Users` (`pseudo`, `email`, `authlevel`, `password`) 
                              VALUES (:pseudo, :email, 1, :password)');

        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);

        $req->execute();

        $lastId = $bdd->lastInsertId();
        return $lastId;
    }

    /**
     * Methode qui permet d'avoir un tableau associatif de toute les information des users
     *
     * @return array
     */
    public function getAllUsers(): array
    {
        $bdd = $this->connectDatabase();
        $req = $bdd->query('SELECT * FROM `Users`');
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Methode qui permet de recuperer le pseudo, email et le nom de la planete d'un seul utilisateur avec son id
     *
     * @param integer $id
     * @return array
     */
    public function getOneUser(int $id): array
    {
        $bdd = $this->connectDatabase();
        $req = $bdd->prepare('SELECT `pseudo`, `email`, `name` FROM `Users` NATURAL JOIN `Planets` WHERE `Users_id` = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetch();
        return $result;
    }

    public function updateOneUser(string $pseudo, string $email, int $id): void
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('UPDATE `Users` SET `pseudo` = :pseudo, `email` = :email WHERE `Users_id` = :id');

        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }
}
