<?php session_start(); ?>
<?php require_once '../controllers/controllerAddPicture.php'; ?>
<?php require_once 'Navbar.php'; ?>

<div class="container-fluid">
    <div class="row w-100 text-center mt-3">
        <h1><b>Ajouter une image</b></h1>
    </div>
    <div class="row h-75 w-100 text-center align-items-center">
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