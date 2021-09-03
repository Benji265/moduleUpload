<?php require_once '../controllers/controllerRegistration.php'; ?>
<?php require_once 'Navbar.php'; ?>

<form action="registration.php" method="POST">
    <div class="container-fluid container-registration">
        <div class="wrap-registration">
            <div class="row text-center mt-3">
                <span class="registration-title">Inscription</span>
            </div>
            <div class="row g-3 d-flex flex-column align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="pseudo" class="form-label">Pseudo :</label>
                    <span class="errorMessage"><?= $errorMsg['pseudo'] ?></span>
                    <input type="text" class="form-control" id="pseudo" placeholder="Pseudo" name="pseudo" value="<?= htmlspecialchars($_POST["pseudo"] ?? '') ?>">
                </div>
                <div class="col-auto">
                    <label for="email" class="form-label">Email :</label>
                    <span class="errorMessage"><?= $errorMsg['email'] ?></span>
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? '') ?>">
                </div>
                <div class="col-auto">
                    <label for="password" class="form-label">Password :</label>
                    <span class="errorMessage"><?= $errorMsg['password'] ?></span>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <div class="col-auto">
                    <label for="confirmPassword" class="form-label">Password :</label>
                    <span class="errorMessage"><?= $errorMsg['confirmPassword'] ?></span>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Password" name="confirmPassword">
                </div>
                <div class="col-auto text-center">
                    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                    <span class="errorMessage"><?= $errorMsg['captcha'] ?></span>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary" value="Valider" name="validRegistration">
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    if (<?= $valideUser ?>) {
        Swal.fire({
            title: '<b>Bienvenu</b>',
            icon: 'success',
            html: '<a href="connection.php">Connexion</a>',
            confirmButtonText: 'OK'
        }).then(function(){
            window.location = '../index.php';
        })
    }
</script>
</body>

</html>