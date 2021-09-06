<?php

session_start();

require_once '../models/Database.php';
require_once '../models/Users.php';
require_once '../models/Form.php';

$regexPseudo = "/^[A-Za-z\é\è\ê\-]+$/";

$valideUser = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['validRegistration'])) {
        $formObj = new Form();

        $errorMsg = array();

        //On check le pseudo
        $errorMsg['pseudo'] = $formObj->checkPseudo($_POST, 'pseudo', $regexPseudo);

        //On check l'email
        $errorMsg['email'] = $formObj->checkEmail($_POST, 'email');

        //On check les passwords
        $errorMsg['password'] = $formObj->checkPassword($_POST, 'password');
        $errorMsg['confirmPassword'] = $formObj->checkPassword($_POST, 'confirmPassword');

        if (!empty($_POST['g-recaptcha-response'])) {
            $test = $formObj->checkCaptcha('6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe', $_POST['g-recaptcha-response']);
        } else {
            $errorMsg['captcha'] = 'Veuillez valider le captcha';
        }

        if ($errorMsg['pseudo'] == 1 && $errorMsg['email'] == 1 && $errorMsg['password'] == 1 && $errorMsg['confirmPassword'] == 1 && $test['success']) {
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
