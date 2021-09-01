<?php

session_start();

require_once '../models/Database.php';
require_once '../models/Users.php';
require_once '../models/Form.php';

$regexPseudo = "/^[A-Za-z\é\è\ê\-]+$/";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['validRegistration'])) {

        $formObj = new Form();

        $errorMsg = array();

        if ($formObj->checkPseudo($_POST, 'pseudo', $regexPseudo)) {
            $errorMsg['pseudo'] = $formObj->checkPseudo($_POST, 'pseudo', $regexPseudo);
        }

        if ($formObj->checkEmail($_POST, 'email')) {
            $errorMsg['email'] = $formObj->checkEmail($_POST, 'email');
        }

        if ($formObj->checkPassword($_POST, 'password')) {
            $errorMsg['password'] = $formObj->checkEmail($_POST, 'email');
        }

        if ($formObj->checkPassword($_POST, 'confirmPassword')) {
            $errorMsg['confirmPassword'] = $formObj->checkEmail($_POST, 'email');
        }

        if (empty($errorMsg)) {

            $userObj = new Users();

            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $confirmPassword = htmlspecialchars($_POST['confirmPassword']);

            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

            $arrayAllUsers = $userObj->getAllUsers();

            foreach ($arrayAllUsers as $value) {
                if ($value['User_Pseudo'] != $pseudo) {
                    $errorMsg = [];
                    $verifOk = true;
                } else {
                    $errorMsg['pseudo'] = 'Pseudo déjà pris';
                    $verifOk = false;
                    break;
                }
            }

            foreach ($arrayAllUsers as $value) {
                if ($value['User_Email'] != $email) {
                    $errorMsg = [];
                    $verifOk = true;
                } else {
                    $errorMsg['email'] = 'Email déjà pris';
                    $verifOk = false;
                    break;
                }
            }

            $valideUser = false;

            if ($verifOk) {
                if ($password != $confirmPassword) {
                    $errorMsg['password'] = 'Les password sont different';
                } else {
                    $userObj->createUser($pseudo, $email, $passwordHash);
                    $valideUser = true;
                }
            }
        }
    }
}
