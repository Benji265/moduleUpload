<?php

require_once 'models/Database.php';
require_once 'models/Picture.php';

$pictureObj = new Picture();

$arrayPicture = $pictureObj->getAllPicture();