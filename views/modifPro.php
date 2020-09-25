<?php
session_start();
if (isset($_SESSION['account']) && $_SESSION['account']['roles'] == 2) {
include '../parts/headerAdmin.php';
include_once '../models/products.php';
include_once '../models/categories.php';
include '../controllers/modifProCtrl.php';
?>
<div class="container" id="modifyProduct">
    <h1 class="text-center"> Modifier un Produit </h1> <?php
    if(isset($productsInfo)){ ?>
    <form class="offset-1 col-9" action="../views/modifPro.php?id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="NomdeProduit"><strong>Nom de Produit :</strong></label>
            <input id="NomdeProduit" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['NomdeProduit']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['NomdeProduit']) ? $_POST['NomdeProduit'] : $productsInfo->NomdeProduit ?>" type="text" name="NomdeProduit" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['NomdeProduit']) ? $formErrors['NomdeProduit'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="Description"><strong>Déscription :</strong></label>
            <textarea id="Description" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['Description']) ? 'is-invalid' : 'is-valid') : '' ?>" type="text" name="Description"><?= isset($_POST['Description']) ? $_POST['Description'] : $productsInfo->Description ?></textarea>
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['Description']) ? $formErrors['Description'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="REF"><strong>REF:</strong></label>
            <input id="REF" type="text" name="REF" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['REF']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['REF']) ? $_POST['REF'] : $productsInfo->REF ?>" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['REF']) ? $formErrors['REF'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="PRIX"><strong>Prix (€):</strong></label>
            <input id="PRIX" name="PRIX" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['PRIX']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['PRIX']) ? $_POST['PRIX'] : $productsInfo->PRIX ?>" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['PRIX']) ? $formErrors['PRIX'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="Image"><strong>Image :</strong></label>
            <input id="Image" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['Image']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['Image']) ? $_POST['Image'] : $productsInfo->Image ?>" type="file" name="Image" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['Image']) ? $formErrors['Image'] : '' ?></p>
        </div>
        <div class="form-group">

        <label for="id_categories"><strong>Category ID :</strong></label>
            <select id="id_categories" name="id_categories">
            <option selected disabled>Choisissez le Category :</option><?php
            foreach($categoryList as $category){ ?>
                <option value="<?= $category->id ?>"><?= $category->id . ' . ' . $category->categoryName ?></option><?php
            } ?>
            </select>
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['id_categories']) ? $formErrors['id_categories'] : '' ?></p>
        </div>
        <input type="submit" class="btn btn-primary" name="modifyProduct" value="Modifier"></input>
    </form>
    <?php } ?>
</div>
<?php
include '../parts/footer.php';
}else { 
    include '../parts/header.php';       
    ?>
    <div class="jumbotron" style="color: red; text-align:center;">
        <h1 class="display-4">Accès Restreint</h1>
        <p class="lead">Accès réservé au personnel autorisé! Veuillez contacter le service technique</p>
        <hr class="my-4">
    </div>
<?php } ?>