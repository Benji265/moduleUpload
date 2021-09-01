<?php session_start(); ?>
<?php require_once 'controllers/controllerIndex.php'; ?>
<?php require_once 'views/Navbar.php'; ?>

<div class="container-fluid mainContent">
    <div class="row text-center mt-3 mb-3">
        <h1><b>Galerie</b></h1>
    </div>
    <div class="row g-4">
        <?php foreach ($arrayPicture as $value) { ?>
            <div class="col-lg-4 col-12">
                <div class="card mx-auto" style="width: 18rem;">
                    <img class="sizeImg" src="data:image/<?= $value['type'] ?>;base64, <?= $value['Base_64'] ?>">
                    <div class="card-body">
                        <p class="card-text text-center"><?= $value['User_Pseudo'] ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>

</html>