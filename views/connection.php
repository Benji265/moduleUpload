<?php require_once '../controllers/controllerConnection.php'; ?>
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
    <link rel="icon" type="image/png" href="<?= DIR ?>assets/images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="<?= DIR ?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= DIR ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= DIR ?>vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= DIR ?>vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="<?= DIR ?>vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= DIR ?>assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= DIR ?>assets/css/main.css">
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

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="../assets/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="connection.php" method="POST">
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <div class="errorMessage text-center"><?= $errorMsg['login'] ?></div>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="login" placeholder="Login">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="validConnection">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="recoveryPassword.php">
                            Password?
                        </a>
                    </div>

                    <div class="text-center">
                        <a class="txt2" href="registration.php">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/select2/select2.min.js"></script>
    <script src="../vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="../assets/js/main.js"></script>

</body>

</html>