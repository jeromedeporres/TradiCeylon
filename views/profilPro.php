<?php
session_start();
if (isset($_SESSION['account']) && $_SESSION['account']['roles'] == 2) {
include '../parts/headerAdmin.php';
include_once '../models/products.php';
include '../controllers/profilProCtrl.php'; 
?>
<div class="card border-primary mx-auto" style="width: 30rem;">
    <div class="card-header border-primary text-primary">
        <h4 class="card-title">Fiche Product</h4>
    </div>
        <div class="card-body">
            <?php if(isset($productsInfo)){ ?>
                <p class="card-text"><strong>Id CAT: </strong><?= $productsInfo->IDCAT ?></p>
                <p class="card-text"><strong>Id PRO : </strong><?= $productsInfo->IDPRO ?></p>
                <p class="card-text"><strong>Nom de Category : </strong><?= $productsInfo->NomdeCAT ?></p>
                <p class="card-text"><strong> Nom de produit : </strong><?= $productsInfo->NomdeProduit ?></p>
                <p class="card-text"><strong>Déscription : </strong><?= $productsInfo->Description ?></p>
                <p class="card-text"><strong>Réference : </strong><?= $productsInfo->REF ?></p>
                <p class="card-text"><strong>Prix : </strong>€ <?= $productsInfo->PRIX ?></p>
                <p class="card-text"><img src="<?= $productsInfo->Image ?>" alt="image" height="200" width="200"></img></p><?php
            }else { ?>
                <p class="card-text"><?= $message ?></p><?php
            } ?>
                <a href="modifPro.php?&id=<?= $productsInfo->IDPRO ?>" class="btn btn-primary btn-sm">Modifier le produit</a>
        </div>
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