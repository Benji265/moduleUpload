<?php

class Users extends Database
{
    public function createUser(string $pseudo, string $email, string $password)
    {
        $bdd = $this->connectDatabase();

        $requete = 'INSERT INTO `Users` (`User_Pseudo`, `User_Email`, `User_Password`) 
                    VALUES	(:pseudo, :email , :password);';

        $exec = $bdd->prepare($requete);

        $exec->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $exec->bindValue(':email', $email, PDO::PARAM_STR);
        $exec->bindValue(':password', $password, PDO::PARAM_STR);
        $exec->execute();
    }

    public function getAllUsers()
    {
        $bdd = $this->connectDatabase();

        $exec = $bdd->query('SELECT * FROM Users')->fetchAll();

        return $exec;
    }
}
