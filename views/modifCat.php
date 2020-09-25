<?php
session_start();
if (isset($_SESSION['account']) && $_SESSION['account']['roles'] == 2) { 
include '../parts/headerAdmin.php';
include_once '../models/categories.php';
include '../controllers/modifCatCtrl.php'; 

if(isset($modifyCatMessageFail)){ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $modifyCatMessageFail ?>
    </div>
<?php } 
if(isset($modifyCatMessageSuccess)){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $modifyCatMessageSuccess ?>
    </div>
<?php } ?>
<div class="content" id="modifCat"><?php
    if(isset($categories)){ ?>
        <form class="offset-4 col-4" action="modifCat.php?&id=<?= $categories->id ?>" method="POST">
            <div class="form-group">
                <label for="categoryName">Nom de category :</label>
                <input id="categoryName" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['categoryName']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['categoryName']) ? $_POST['categoryName'] : $categories->categoryName ?>" type="text" name="categoryName" />
                <!--message d'erreur-->
                <p class="errorForm"><?= isset($formErrors['categoryName']) ? $formErrors['categoryName'] : '' ?></p>
            </div>
            <input type="submit" class="btn btn-primary" name="modify" value="Enregistrer"></input>
        </form><?php
    } ?>
</div>
<?php include '../parts/footer.php';
}else { 
    include '../parts/header.php';       
?>
    <div class="jumbotron" style="color: red; text-align:center;">
        <h1 class="display-4">Accès Restreint</h1>
            <p class="lead">Accès réservé au personnel autorisé! Veuillez contacter le service technique</p>
            <hr class="my-4">
    </div>
<?php } ?>