<?php

class Token extends Database
{
    public function insertToken(string $token, string $userID): void
    {
        $bdd = $this->connectDatabase();

        $requete = 'INSERT INTO `Token_Password` (`Token_Password`, `User_ID`) VALUES (:token, :userID)';

        $exec = $bdd->prepare($requete);

        $exec->bindValue(':token', $token, PDO::PARAM_STR);
        $exec->bindValue(':userID', $userID, PDO::PARAM_INT);
        $exec->execute();
    }

    public function getAllToken(): array
    {
        $bdd = $this->connectDatabase();

        $requete = 'SELECT * FROM `Token_Password`';

        $exec = $bdd->query($requete)->fetchAll();

        return $exec;
    }

    public function deleteToken(int $id): void
    {
        $bdd = $this->connectDatabase();

        $requete = 'DELETE FROM `Token_Password` WHERE `User_ID` = :id';

        $exec = $bdd->prepare($requete);

        $exec->bindValue(':id', $id, PDO::PARAM_INT);
        $exec->execute();
    }
}
