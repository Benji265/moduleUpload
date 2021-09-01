<?php session_start(); ?>
<?php require_once '../controllers/controllerEditPicture.php'; ?>
<?php require_once 'Navbar.php'; ?>

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
                            <button class="btn btn-danger" type="submit" name="deleteImg" value="<?= $value['Picture_ID'] ?>">Supprimer</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</div>
</body>

</html>