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
}
