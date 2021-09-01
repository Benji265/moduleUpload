<?php

class Token extends Database
{
    public function insertToken($token, $userID)
    {
        $bdd = $this->connectDatabase();

        $requete = 'INSERT INTO `Token_Password` (`Token_Password`, `User_ID`) VALUES (:token, :userID)';

        $exec = $bdd->prepare($requete);

        $exec->bindValue(':token', $token, PDO::PARAM_STR);
        $exec->bindValue(':userID', $userID, PDO::PARAM_INT);
        $exec->execute();
    }

    public function getAllToken()
    {
        $bdd = $this->connectDatabase();

        $requete = 'SELECT * FROM `Token_Password`';

        $exec = $bdd->query($requete)->fetchAll();

        return $exec;
    }

    public function deleteToken($id)
    {
        $bdd = $this->connectDatabase();

        $requete = 'DELETE FROM `Token_Password` WHERE `User_ID` = :id';

        $exec = $bdd->prepare($requete);

        $exec->bindValue(':id', $id, PDO::PARAM_INT);
        $exec->execute();
    }
}
