<?php session_start(); ?>
<?php require_once '../controllers/controllerRecoveryPassword.php'; ?>
<?php require_once 'Navbar.php'; ?>


<?php if (!$_GET['token']) { ?>
    <div class="container-fluid container-recovery">
        <div class="wrap-recovery">
            <div class="row mt-3 mb-3">
                <span class="recovery-title">Recuperation de mot de passe</span>
            </div>
            <form class="align-items-center" action="recoveryPassword.php" method="POST" novalidate>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <label class="form-label" for="recoveryEmail">Email :</label>
                        <span class="errorMessage"><?= $errorMsg['email'] ?></span>
                        <input class="input100" type="email" name="recoveryEmail" id="recoveryEmail">
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-auto">
                        <input type="submit" class="btn btn-primary" value="Valider" name="validRecovery">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } elseif ($urlValid) { ?>
    <div class="container-fluid container-recovery">
        <div class="wrap-recovery">
            <div class="row mt-3 mb-3">
                <span class="recovery-title">Nouveaux mot de passe</span>
            </div>
            <form class="align-items-center" action="recoveryPassword.php?token=<?= $_GET['token'] ?>&id=<?= $_GET['id'] ?>" method="POST" novalidate>
                <div class="row justify-content-center">
                    <div class="col-auto mb-3">
                        <label class="form-label" for="recoveryPassword">Mot de passe :</label>
                        <span class="errorMessage"></span>
                        <input class="input100" type="password" name="recoveryPassword" id="recoveryPassword">
                    </div>
                    <div class="col-auto">
                        <label class="form-label" for="recoveryConfirmPassword">Confirmation du mot de passe :</label>
                        <input class="input100" type="password" name="recoveryConfirmPassword" id="recoveryConfirmPassword">
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-auto">
                        <input type="submit" class="btn btn-primary" value="Valider" name="validPassword">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } else { ?>
    <div class="container-fluid container-recovery">
        <div class="wrap-recovery">
            <div class="row mt-3 mb-3">
                <span class="recovery-title">Erreur</span>
            </div>
            <div class="row text-center">
                <p class="errorMessage">Vous avez déjà changer de mot de passe</p>
            </div>
            <div class="row text-center">
                <p><a href="../index.php">Accueil</a></p>
            </div>
        </div>
    </div>
<?php } ?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    if (<?= $verifOk ?>) {
        Swal.fire({
            title: '<b>Email envoyée</b>',
            icon: 'success',
            confirmButtonText: 'OK'
        })
    }
    if (<?= $tokenOk ?>) {
        Swal.fire({
            title: '<b>Mot de passe changer</b>',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(function(){
            window.location = 'connection.php';
        })
    }
</script>
</body>

</html>