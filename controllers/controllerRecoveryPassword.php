<?php

require_once '../models/Database.php';
require_once '../models/Users.php';
require_once '../models/Token.php';
require_once '../function/function.php';
require_once '../vendor/autoload.php';

$getToken = $_GET['token'];
$getId = $_GET['id'];
$verifOk = 0;
$tokenOk = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['validRecovery'])) {

        $userObj = new Users();
        $arrayUsers = $userObj->getAllUsers();

        $errorMsg = array();

        $email = htmlspecialchars($_POST['recoveryEmail']);

        foreach ($arrayUsers as $value) {
            if ($value['User_Email'] == $email) {
                $errorMsg = [];
                $userID = $value['User_ID'];
                $verifOk = true;
                break;
            } else {
                $errorMsg['email'] = 'Email introuvable';
            }
        }

        if ($verifOk) {

            $token = bin2hex(random_bytes(32));

            $tokenObj = new Token();
            $tokenObj->insertToken($token, $userID);

            if ($_SERVER['SERVER_NAME'] == 'localhost') {
                $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
                    ->setUsername('f52d2730cc6c18')
                    ->setPassword('c7734488e50bfc');
            } else {
                $transport = new Swift_SmtpTransport();
            }

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message('Récuperation de mot de passe'))
                ->setFrom(['admin@gmail.com' => 'Admin'])
                ->setTo(['receiver@domain.org'])
                ->setBody('Cliquez sur le lien pour changer de mot de passe : <a href="http://localhost:8888/PDO/Exo3/views/recoveryPassword.php?token=' . $token . '&id=' . $userID . '">Nouveaux mot de passe</a>', 'text/html');

            // Send the message
            $result = $mailer->send($message);
        }
    }

    if (isset($_POST['validPassword'])) {
        $userObj = new Users();
        $tokenObj = new Token();
        $arrayAllToken = $tokenObj->getAllToken();

        if (!empty($_POST['recoveryPassword']) && !empty($_POST['recoveryConfirmPassword'])) {

            if ($_POST['recoveryPassword'] == $_POST['recoveryConfirmPassword']) {
                foreach ($arrayAllToken as $value) {
                    if ($getToken == $value['Token_Password']) {
                        $tokenOk = true;
                        break;
                    } else {
                        $tokenOk = false;
                    }
                }

                if ($tokenOk) {
                    $tokenObj->deleteToken($getId);
                    $newPassword = password_hash(htmlspecialchars($_POST['recoveryPassword']), PASSWORD_BCRYPT);
                    $userObj->updateUser($newPassword, $getId);
                }
            }
        }
    }
}
