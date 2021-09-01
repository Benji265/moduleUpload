<?php

require_once '../models/Database.php';
require_once '../models/Picture.php';

$pictureObj = new Picture();
$arrayPictureUser = $pictureObj->getPictureForOneUser($_SESSION['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['deleteImg'])) {
        $deletePicture = $pictureObj->deleteOnePicture($_POST['deleteImg']);
        header('Refresh: 0');
    }
}