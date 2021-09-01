<?php session_start(); ?>
<?php require_once '../controllers/controllerRecoveryPassword.php'; ?>
<?php require_once 'Navbar.php'; ?>

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
                    <input type="submit" class="btn btn-primary" value="Valider" name="validRegistration">
                </div>
            </div>
        </form>
    </div>
</div>