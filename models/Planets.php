<?php

class Planets extends Database
{
    /**
     * Methode qui permet de créer une planete pour un utilisateur qui vien de s'inscire
     *
     * @param array $arr
     * @return void
     */
    public function createPlanetForOneUser(array $arr): void
    {
        $bdd = $this->connectDatabase();

        $req = 'INSERT INTO `Planets` (`name`, 
                                       `image`, 
                                       `diameter`, 
                                       `field_max`, 
                                       `temp_max`, 
                                       `metal`, 
                                       `metal_per_hour`, 
                                       `metal_max`, 
                                       `cristal`, 
                                       `cristal_per_hour`, 
                                       `cristal_max`, 
                                       `deuterium`, 
                                       `deuterium_per_hour`, 
                                       `deuterium_max`, 
                                       `Users_id`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $exec = $bdd->prepare($req);
        $exec->execute($arr);
    }

    /**
     * Methode qui permet de créer une url pour link l'image de l'utilisateur dans la bdd
     *
     * @param integer $nb
     * @return string
     */
    public function randomImgPlanet(int $nb): string
    {
        $link = '../assets/img/planeten/';

        $arrayLinkImgPlanet = [
            'dschjungelplanet01.jpg',
            'dschjungelplanet02.jpg',
            'dschjungelplanet03.jpg',
            'dschjungelplanet04.jpg',
            'dschjungelplanet05.jpg',
            'dschjungelplanet06.jpg',
            'dschjungelplanet07.jpg',
            'dschjungelplanet08.jpg',
            'dschjungelplanet09.jpg',
            'dschjungelplanet10.jpg',
            'eisplanet01.jpg',
            'eisplanet02.jpg',
            'eisplanet03.jpg',
            'eisplanet04.jpg',
            'eisplanet05.jpg',
            'eisplanet06.jpg',
            'eisplanet07.jpg',
            'eisplanet08.jpg',
            'eisplanet09.jpg',
            'eisplanet10.jpg',
            'normaltempplanet01.jpg',
            'normaltempplanet02.jpg',
            'normaltempplanet03.jpg',
            'normaltempplanet04.jpg',
            'normaltempplanet05.jpg',
            'normaltempplanet06.jpg',
            'normaltempplanet07.jpg',
            'normaltempplanet08.jpg',
            'trockenplanet01.jpg',
            'trockenplanet02.jpg',
            'trockenplanet03.jpg',
            'trockenplanet04.jpg',
            'trockenplanet05.jpg',
            'trockenplanet06.jpg',
            'trockenplanet07.jpg',
            'trockenplanet08.jpg',
            'trockenplanet09.jpg',
            'trockenplanet10.jpg',
            'wasserplanet01.jpg',
            'wasserplanet02.jpg',
            'wasserplanet03.jpg',
            'wasserplanet04.jpg',
            'wasserplanet05.jpg',
            'wasserplanet06.jpg',
            'wasserplanet07.jpg',
            'wasserplanet08.jpg',
            'wasserplanet09.jpg',
        ];

        return $link . $arrayLinkImgPlanet[$nb];
    }

    /**
     * Methode pour recuperer les infos de la planete pour un utilisateur dans un tableau
     *
     * @param integer $id
     * @return array
     */
    public function getInfosPlanetForOneUser(int $id): array
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('SELECT `name`, `image`, `diameter`, `field_max`, `temp_max` 
                              FROM `Planets`
                              WHERE `Users_id` = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
        $result = $req->fetch();
        return $result;
    }

    /**
     * Methode qui permet d'avoir les information des ressource pour un utilisateur
     *
     * @param integer $id
     * @return array
     */
    public function getInfosRessourceForOneUser(int $id): array
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('SELECT `metal`, `cristal`, `deuterium`, energy FROM `Planets` WHERE `Users_id` = :id');

        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
        $result = $req->fetch();
        return $result;
    }

    /**
     * Methode qui permet de mettre a jour les ressource d'un utilisateur apres construction d'un batiment
     *
     * @param integer $metalUser
     * @param integer $metalPrice
     * @param integer $cristalUser
     * @param integer $cristalPrice
     * @param integer $deuteriumUser
     * @param integer $deuteriumPrice
     * @param integer $energyUser
     * @param integer $ernergyCost
     * @param integer $id
     * @return void
     */
    public function updateRessourceAfterCreate(int $metalUser, int $metalPrice, int $cristalUser, int $cristalPrice, int $deuteriumUser, int $deuteriumPrice, int $energyUser, int $ernergyCost, int $id): void
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('UPDATE `Planets` SET `metal` = (:metalUser - :metalPrice), `cristal` = (:cristalUser - :cristalPrice), `deuterium` = (:deuteriumUser - :deuteriumPrice), `energy` = (:energyUser - :energyCost) WHERE `Users_id` = :id');

        $req->bindValue(':metalUser', $metalUser, PDO::PARAM_INT);
        $req->bindValue(':metalPrice', $metalPrice, PDO::PARAM_INT);
        $req->bindValue(':cristalUser', $cristalUser, PDO::PARAM_INT);
        $req->bindValue(':cristalPrice', $cristalPrice, PDO::PARAM_INT);
        $req->bindValue(':deuteriumUser', $deuteriumUser, PDO::PARAM_INT);
        $req->bindValue(':deuteriumPrice', $deuteriumPrice, PDO::PARAM_INT);
        $req->bindValue(':energyUser', $energyUser, PDO::PARAM_INT);
        $req->bindValue(':energyCost', $ernergyCost, PDO::PARAM_INT);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }

    /**
     * Methode qui permet de mettre a jour les ressource d'un utilisateur apres construction d'une central electrique solaire
     *
     * @param integer $metalUser
     * @param integer $metalPrice
     * @param integer $cristalUser
     * @param integer $cristalPrice
     * @param integer $deuteriumUser
     * @param integer $deuteriumPrice
     * @param integer $energyUser
     * @param integer $ernergyCost
     * @param integer $id
     * @return void
     */
    public function updateRessourceAfterCreateCentrale(int $metalUser, int $metalPrice, int $cristalUser, int $cristalPrice, int $deuteriumUser, int $deuteriumPrice, int $energyUser, int $ernergyCost, int $id): void
    {
        $bdd = $this->connectDatabase();

        $req = $bdd->prepare('UPDATE `Planets` SET `metal` = (:metalUser - :metalPrice), `cristal` = (:cristalUser - :cristalPrice), `deuterium` = (:deuteriumUser - :deuteriumPrice), `energy` = (:energyUser + :energyCost) WHERE `Users_id` = :id');

        $req->bindValue(':metalUser', $metalUser, PDO::PARAM_INT);
        $req->bindValue(':metalPrice', $metalPrice, PDO::PARAM_INT);
        $req->bindValue(':cristalUser', $cristalUser, PDO::PARAM_INT);
        $req->bindValue(':cristalPrice', $cristalPrice, PDO::PARAM_INT);
        $req->bindValue(':deuteriumUser', $deuteriumUser, PDO::PARAM_INT);
        $req->bindValue(':deuteriumPrice', $deuteriumPrice, PDO::PARAM_INT);
        $req->bindValue(':energyUser', $energyUser, PDO::PARAM_INT);
        $req->bindValue(':energyCost', $ernergyCost, PDO::PARAM_INT);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }
}
