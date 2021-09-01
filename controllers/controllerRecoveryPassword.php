<?php

require_once '../models/Database.php';
require_once '../models/Users.php';
require_once '../function/function.php';
require_once '../vendor/autoload.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['validRegistration'])) {

        $userObj = new Users();
        $arrayUsers = $userObj->getAllUsers();

        $errorMsg = array();

        $email = htmlspecialchars($_POST['recoveryEmail']);

        foreach ($arrayUsers as $value) {
            if ($value['User_Email'] == $email) {
                $errorMsg = [];
                $verifOk = true;
                break;
            } else {
                $errorMsg['email'] = 'Email introuvable';
                $verifOk = false;
            }
        }

        if ($verifOk) {
           
            $token = bin2hex(random_bytes(32));

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
                ->setBody('Cliquez sur le lien pour changer de mot de passe : http://localhost:8888/PDO/Exo3/views/recoveryPassword.php?token=' . $token);

            // Send the message
            $result = $mailer->send($message);
        }
    }
}