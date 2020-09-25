<?php
session_start();
if (isset($_SESSION['account']) && $_SESSION['account']['roles'] == 2) {
include '../parts/headerAdmin.php';
include_once '../models/categories.php';
include '../controllers/listCatCtrl.php'; 

 if(isset($_GET['idDelete'])){ ?>
        <div class="alert text-center alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h1 class="h4">Voulez-vous supprimer ce category?</h1>
            <form class="text-center" method="POST" action="listCat.php">
                <input type="hidden" name="idDelete" value="<?= $categories->id ?>" />
                <button type="submit" class="btn btn-primary btn-sm" name="confirmDelete">OUI</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="alert">Non</button>
            </form>
        </div><?php
    } ?>
    <!-- bar de search-->
    <form method="GET" action="listCat.php" class="form-inline justify-content-center">
    <input id="search" name="search" type="text" placeholder="rechercher un category" />
    <button type="submit" class="btn btn-sm btn-primary" name="sendSearch">Rechercher</button>
</form><?php
if(isset($resultsNumber) && $resultsNumber == 0){ ?>
        <p class="text-center m-5"><?= $searchMessage ?></p><?php
}else { ?>
    <p class="text-center m-5"><?= $searchMessage ?></p>
    <div class="container table-responsive-lg" id="tablePro">
        <table class="table table-hover table-sm  text-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Affichage</th>
                    <th scope="col">Suppression</th>
                </tr>
            </thead>
                <tbody>
                    <?php foreach ($categoryList as $listCategories){ ?>
                        <tr>
                            <td><?= $listCategories->id ?></td>
                            <td><?= $listCategories->categoryName ?></td>
                            <td><button type="button" class="btn btn-primary btn-sm"><a class="text-white" href="catInfo.php?&id=<?= $listCategories->id ?>">Afficher</a></button></td>
                            <td><button type="button" class="btn btn-danger btn-sm"><a class="text-white" href="listCat.php?&idDelete=<?= $listCategories->id ?>">Supprimer</a></button></td>
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