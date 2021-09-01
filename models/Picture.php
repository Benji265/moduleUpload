<?php

class Picture extends Database
{
    public function addPicture($base64, $type, $userID)
    {
        $bdd = $this->connectDatabase();

        $requete = 'INSERT INTO `Pictures` (`Base_64`, `type`, `User_ID`) VALUES (:base64, :type, :userID)';

        $exec = $bdd->prepare($requete);

        $exec->bindValue(':base64', $base64, PDO::PARAM_STR);
        $exec->bindValue(':type', $type, PDO::PARAM_STR);
        $exec->bindValue(':userID', $userID, PDO::PARAM_STR);

        $exec->execute();
    }

    public function getAllPicture()
    {
        $bdd = $this->connectDatabase();

        $requete = 'SELECT `User_Pseudo`, `Base_64`, `type` FROM `Pictures` 
                    INNER JOIN `Users` ON `Pictures`.`User_ID` = `Users`.`User_ID`';

        $exec = $bdd->query($requete)->fetchAll();

        return $exec;
    }

    public function getPictureForOneUser($id)
    {
        $bdd = $this->connectDatabase();

        $requete = 'SELECT * FROM `Pictures` WHERE `User_ID` = :id';

        $exec = $bdd->prepare($requete);

        $exec->bindValue(':id', $id, PDO::PARAM_INT);
        $exec->execute();
        $result = $exec->fetchAll();

        return $result;
    }

    public function deleteOnePicture($id)
    {
        $bdd = $this->connectDatabase();

        $requete = 'DELETE FROM `Pictures` WHERE `Picture_ID` = :id';

        $exec = $bdd->prepare($requete);

        $exec->bindValue(':id', $id, PDO::PARAM_INT);
        $exec->execute();
    }
}