<?php

require_once '../models/Database.php';
require_once '../models/Picture.php';

$validDelete = 0;

$pictureObj = new Picture();
$arrayPictureUser = $pictureObj->getPictureForOneUser($_SESSION['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['deleteImg'])) {
        $deletePicture = $pictureObj->deleteOnePicture($_POST['deleteImg']);
        $validDelete = true;
    }
}