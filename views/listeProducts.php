<?php
session_start();
if (isset($_SESSION['account']) && $_SESSION['account']['roles'] == 2) {
include '../parts/headerAdmin.php';
include '../models/products.php';
require_once '../models/categories.php';
include '../controllers/listProductsCtrl.php'; 

 if(isset($_GET['idDelete'])){ ?>
        <div class="alert text-center alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h1 class="h4">Voulez-vous supprimer ce Produit?</h1>
            <form class="text-center" method="POST" action="../views/listeProducts.php">
                <input type="hidden" name="idDelete" value="<?= $products->id ?>" />
                <button type="submit" class="btn btn-primary btn-sm" name="confirmDelete">OUI</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="alert">Non</button>
            </form>
        </div><?php
    } ?>
    <!-- bar de search-->
    <form method="GET" action="listeProducts.php" class="form-inline justify-content-center">
    <input id="search" name="search" type="text" placeholder="rechercher un produit" />
    <button type="submit" class="btn btn-sm btn-primary" name="sendSearch">Rechercher</button>
</form><?php
if(isset($resultsNumber) && $resultsNumber == 0){ ?>
        <p class="text-center m-5"><?= $searchMessage ?></p><?php
}else { ?>
    <p class="text-center m-5"><?= $searchMessage ?></p>
    <div class="container table-responsive-lg" id="tablePro">
        <table class="table table-hover table-sm">
            <thead class="thead-light text-center">
            <tr>
                <th scope="col">ID CAT</th>
                <th scope="col">ID PRO</th>
                <th scope="col">Nom de CAT</th>
                <th scope="col">Nom de Produit</th>
                <th scope="col">Description</th>
                <th scope="col">REF</th>
                <th scope="col">Prix</th>
                <th scope="col">Image</th>
                <th scope="col">Affichange</th>
                <th scope="col">Suppression</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($productsList as $listproducts){ ?>
            <tr>
                <td><?= $listproducts->IDCAT ?></td>
                <td><?= $listproducts->IDPRO ?></td>
                <td><?= $listproducts->NomdeCAT ?></td>
                <td><?= $listproducts->NomdeProduit ?></td>
                <td><?= $listproducts->Description ?></td>
                <td><?= $listproducts->REF ?></td>
                <td><?= $listproducts->PRIX ?></td>
                <td><img src="<?= $listproducts->Image ?>" height="50" width="50"></img></td>
                <td><button type="button" class="btn btn-primary btn-sm"><a class="text-white" href="profilPro.php?&id=<?= $listproducts->IDPRO ?>">Voir le produit</a></button></td>
                <td><button type="button" class="btn btn-danger btn-sm"><a class="text-white" href="listeProducts.php?&idDelete=<?= $listproducts->IDPRO ?>">Supprimer</a></button></td>
            </tr><?php }
    } ?>
        </tbody>
        </table>
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