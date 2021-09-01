<?php
require_once '../models/Database.php';
require_once '../models/Picture.php';
require_once '../function/function.php';

$extensions = [
    "image/png",
    "image/jpeg",
    "image/jpg",
    "image/gif"
];

$uploadOk = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['validAddPicture'])) {
        //On verifie qu'il n'y pas d'erreur et que le fichiers est present
        if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
            //On recupèere le type du fichers
            $typeFile = mime_content_type(strtolower($_FILES['file']['tmp_name']));
            //On recupère l'extension de l'image
            $extension = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
            //On verifie que c'est bien une image
            if (in_array($typeFile, $extensions)) {
                //On verifie que le fichier a été upload
                if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
                    $pictureObj = new Picture();
                    //On encode l'image
                    $base64 = base64_encode(file_get_contents($_FILES["file"]["tmp_name"]));
                    //On envoie l'image dans la bdd
                    $pictureObj->addPicture($base64, $extension, $_SESSION['id']);
                    $uploadOk = true;
                }
            } else {
                $errorMsg['file'] = 'Votre fichier n\'est pas une image';
            }
        } else {
            $errorMsg['file'] = 'Veuillez choisir une image';
        }
    }
}
