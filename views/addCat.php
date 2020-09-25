<?php
include '../parts/headerAdmin.php';
include_once '../models/categories.php';
include '../controllers/addCatCtrl.php';
?>
<div class="container" id="addCategories">
    <h1 class="text-center"> Ajouter un Category </h1>
    <form class="offset-1 col-9" action="../views/addCat.php" method="POST" >
        <div class="form-group">
            <label for="CategoryName"><strong>Nom de Category :</strong></label>
            <input id="CategoryName" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['CategoryName']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['CategoryName']) ? $_POST['CategoryName'] : '' ?>" type="text" name="CategoryName" />
            <!--message d'erreur-->
                <p class="errorForm"><?= isset($formErrors['CategoryName']) ? $formErrors['CategoryName'] : '' ?></p>
        </div>
            <input type="submit" class="btn btn-primary" name="addCategory" value="Ajouter"></input>
                <p class="formOk"><?= isset($addCategoryMessage) ? $addCategoryMessage : '' ?></p>
    </form>
</div>
<?php include '../parts/footer.php';