<?php
session_start();
if (isset($_SESSION['account']) && $_SESSION['account']['roles'] == 2) { 
    include '../parts/headerAdmin.php';
    include_once '../models/products.php';
    include_once '../models/categories.php';
    include '../controllers/addProductsCtrl.php'; ?>
<div class="container" id="addProducts">
    <h1 class="text-center"> Ajouter un Produit </h1>
    <form class="col-12 col-sm-12" action="../views/addProducts.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="productName"><strong>Nom de Produit :</strong></label>
            <input id="productName" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['productName']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['productName']) ? $_POST['productName'] : '' ?>" type="text" name="productName" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['productName']) ? $formErrors['productName'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="description"><strong>Description :</strong></label>
            <textarea id="description" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['description']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['description']) ? $_POST['description'] : '' ?>" type="text" name="description"></textarea>
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['description']) ? $formErrors['description'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="productReference"><strong>REF:</strong></label>
            <input id="productReference" type="text" name="productReference" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['productReference']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['productReference']) ? $_POST['productReference'] : '' ?>" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['productReference']) ? $formErrors['productReference'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="price"><strong>Prix (€):</strong></label>
            <input id="price" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['price']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>" type="number" name="price" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['price']) ? $formErrors['price'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="image"><strong>Image :</strong></label>
            <input id="image" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['image']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['image']) ? $_POST['image'] : '' ?>" type="file" name="image" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['image']) ? $formErrors['image'] : '' ?></p>
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
        <input type="submit" class="btn btn-primary" name="addProduct" value="Ajouter"></input>
        <p class="formOk"><?= isset($addproductMessage) ? $addproductMessage : '' ?></p>
    </form>
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