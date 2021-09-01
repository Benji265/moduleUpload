<?php

require_once 'vendor/autoload.php';

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
  ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
  ->setBody('Here is the message itself');

// Send the message
$result = $mailer->send($message);
