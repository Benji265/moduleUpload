<?php session_start(); ?>
<?php require_once '../controllers/controllerEditPicture.php'; ?>
<?php require_once 'Navbar.php'; ?>


<?php if ($_SESSION['sessionStart'] == "Oui") { ?>
    <div class="container-fluid mainContent">
        <div class="row text-center mt-3 mb-3">
            <h1><b>Mes Images</b></h1>
        </div>
        <div class="row g-4">
            <?php foreach ($arrayPictureUser as $value) { ?>
                <div class="col-lg-4 col-12">
                    <form action="editPicture.php" method="POST">
                        <div class="card mx-auto" style="width: 18rem;">
                            <img class="sizeImg" src="data:image/<?= $value['type'] ?>;base64, <?= $value['Base_64'] ?>">
                            <div class="card-body d-flex justify-content-center">
                                <button class="btn btn-danger" type="submit" name="deleteImg" value="<?= $value['Picture_ID'] ?>"><i class="bi bi-trash"></i> Supprimer</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } else { ?>
    <div class="container-fluid container-editPicture">
        <div class="wrap-editPicture">
            <div class="row text-center mt-3 mb-3">
                <span class="editPicture-title">Erreur</span>
            </div>
            <div class="row text-center">
                <p class="errorMessage">Veuillez vous connectez pour voir vos images</p>
            </div>
            <div class="row text-center">
                <p><a href="connection.php">Connexion</a></p>
            </div>
        </div>
    </div>
<?php } ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    if (<?= $validDelete ?>) {
        Swal.fire({
            title: '<b>Image Supprimer</b>',
            icon: 'success',
            confirmButtonText: '<a href="editPicture.php">OK</a>'
        })
    }
</script>
</body>

</html>