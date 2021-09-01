<?php require_once '../controllers/controllerRegistration.php'; ?>
<?php require_once 'Navbar.php'; ?>

<form action="registration.php" method="POST">
    <div class="container-fluid">
        <div class="row text-center mt-3">
            <h1><b>Inscription</b></h1>
        </div>
        <div class="row g-3 d-flex flex-column align-items-center justify-content-center mt-2">
            <div class="col-3">
                <label for="pseudo" class="form-label">Pseudo :</label>
                <span class="errorMessage"><?= $errorMsg['pseudo'] ?></span>
                <input type="text" class="form-control" id="pseudo" placeholder="Pseudo" name="pseudo" value="<?= htmlspecialchars($_POST["pseudo"] ?? '') ?>">
            </div>
            <div class="col-3">
                <label for="email" class="form-label">Email :</label>
                <span class="errorMessage"><?= $errorMsg['email'] ?></span>
                <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? '') ?>">
            </div>
            <div class="col-3">
                <label for="password" class="form-label">Password :</label>
                <span class="errorMessage"><?= $errorMsg['password'] ?></span>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <div class="col-3">
                <label for="confirmPassword" class="form-label">Password :</label>
                <span class="errorMessage"><?= $errorMsg['confirmPassword'] ?></span>
                <input type="password" class="form-control" id="confirmPassword" placeholder="Password" name="confirmPassword">
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-1">
                <input type="submit" class="btn btn-primary" value="Valider" name="validRegistration">
            </div>
        </div>
    </div>
</form>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    if (<?= $valideUser ?>) {
        Swal.fire({
            title: '<b>Bienvenu</b>',
            icon: 'success',
            html: '<a href="connection.php">Connexion</a>',
            confirmButtonText: '<a href="../index.php">OK</a>'
        })
    }
</script>
</body>

</html>