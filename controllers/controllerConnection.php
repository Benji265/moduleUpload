<?php

session_start();

require_once '../models/Database.php';
require_once '../models/Users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['validConnection'])) {
        if (!empty($_POST['login']) && !empty($_POST['password'])) {

            $userObj = new Users();
            $arrayAllUsers = $userObj->getAllUsers();

            $login = trim(htmlspecialchars($_POST['login']));
            $password = htmlspecialchars($_POST['password']);

            foreach ($arrayAllUsers as $value) {
                if ($value['User_Pseudo'] == $login || $value['User_Email'] == $login) {
                    $verifOk = true;
                    $passwordHash = $value['User_Password'];
                    $name = $value['User_Pseudo'];
                    $id = $value['User_ID'];
                    break;
                } else {
                    $verifOk = false;
                    $errorMsg['login'] = 'Login Invalide';
                }
            }

            if ($verifOk) {
                if (password_verify($password, $passwordHash)) {
                    $_SESSION['sessionStart'] = "Oui";
                    $_SESSION['name'] = $name;
                    $_SESSION['id'] = $id;
                    header('Location: ../index.php');
                }
            }
        }
    }
}