<?php
define('DIR', 'http://localhost:8888/PDO/Exo3/');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= DIR ?>assets/css/style.css">
    <title>Upload Image</title>
</head>

<body>
    <nav class="navbar fixed-bottom navbar-light bg-light">
        <div class="container-fluid justify-content-around">
            <a href="<?= DIR ?>"><button class="btn" type="button"><i class="bi bi-house-door-fill fs-2"></i>
                    <div>Home</div>
                </button></a>
            <?php if ($_SESSION['sessionStart'] == "Oui") { ?>
                <a href="<?= DIR ?>views/addPicture.php"><button class="btn" type="button"><i class="bi bi-plus-lg fs-2"></i>
                        <div>Ajouter</div>
                    </button></a>
                <a href="<?= DIR ?>views/editPicture.php"><button class="btn" type="button"><i class="bi bi-sliders fs-2"></i>
                        <div>Mes Images</div>
                    </button></a>
                <a href="<?= DIR ?>views/disconnect.php"><button class="btn" type="button"><i class="bi bi-door-open-fill fs-2"></i>
                        <div>Deconnexion</div>
                    </button></a>
            <?php } else { ?>
                <a href="<?= DIR ?>views/connection.php"><button class="btn" type="button"><i class="bi bi-person-fill fs-2"></i>
                        <div>Connexion</div>
                    </button></a>
            <?php } ?>
        </div>
    </nav>