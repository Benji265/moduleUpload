<?php session_start(); ?>
<?php require_once '../controllers/controllerAddPicture.php'; ?>
<?php require_once 'Navbar.php'; ?>

<?php if ($_SESSION['sessionStart'] == "Oui") { ?>
    <div class="container-fluid container-addPicture">
        <div class="wrap-addPicture">
            <div class="row text-center mt-3 mb-3">
                <span class="addPicture-title">Ajouter une image</span>
            </div>
            <div class="row text-center align-items-center">
                <form action="addPicture.php" enctype="multipart/form-data" method="POST">
                    <label for="file" class="myLabel mb-3">Veuillez choisir une image :</label>
                    <input type="file" name="file" id="file" class="mt-3">
                    <div class="row mt-2 d-flex flex-column">
                        <div class="col">
                            <input type="submit" name="validAddPicture" class="btn btn-primary mt-3" value="Envoyer">
                        </div>
                        <div class="col mt-3">
                            <span class="errorMessage"><?= $errorMsg['file'] ?></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="container-fluid container-addPicture">
        <div class="wrap-addPicture">
            <div class="row text-center mt-3 mb-3">
                <span class="addPicture-title">Erreur</span>
            </div>
            <div class="row text-center">
                <p class="errorMessage">Veuillez vous connectez pour ajouter des images</p>
            </div>
            <div class="row text-center">
                <p><a href="connection.php">Connexion</a></p>
            </div>
        </div>
    </div>
<?php } ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    if (<?= $uploadOk ?>) {
        Swal.fire({
            title: '<b>Image uploader</b>',
            icon: 'success',
            confirmButtonText: 'OK'
        })
    }
</script>
</body>

</html>