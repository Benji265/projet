<?php

class Users extends Database
{
    public function createUser($pseudo, $email, $password)
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('INSERT INTO `Users` (`pseudo`, `email`, `authlevel`, `password`) 
                              VALUES (:pseudo, :email, 1, :password)');

        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);

        $req->execute();
    }
}
