<?php
session_start();
if (isset($_SESSION['account']) && $_SESSION['account']['roles'] == 2) {
include '../parts/headerAdmin.php';
include '../models/users.php';
include '../controllers/listUsersCtrl.php'; 

 if(isset($_GET['idDelete'])){ ?>
        <div class="alert text-center alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h1 class="h4">Voulez-vous supprimer ce utilisateur?</h1>
            <form class="text-center" method="POST" action="listUsers.php">
                <input type="hidden" name="idDelete" value="<?= $users->id ?>" />
                <button type="submit" class="btn btn-primary btn-sm" name="confirmDelete">OUI</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="alert">Non</button>
            </form>
        </div><?php
    } ?>
    <!-- bar de search-->
    <form method="GET" action="listUsers.php" class="form-inline justify-content-center">
    <input id="search" name="search" type="text" placeholder="rechercher un user" />
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
                    <th scope="col">ID Role</th>
                    <th scope="col">Nom de Utilisateur</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Affichange</th>
                    <th scope="col">Suppression</th>
                </tr>
            </thead>
                <tbody>
                    <?php foreach ($usersList as $listUsers){ ?>
                        <tr>
                            <td><?= $listUsers->id ?></td>
                            <td><?= $listUsers->id_roles ?></td>
                            <td><?= $listUsers->userName ?></td>
                            <td><?= $listUsers->email ?></td>
                            <td><button type="button" class="btn btn-primary btn-sm"><a class="text-white" href="profilUser.php?&id=<?= $listUsers->id ?>">Afficher</a></button></td>
                            <td><button type="button" class="btn btn-danger btn-sm"><a class="text-white" href="listUsers.php?&idDelete=<?= $listUsers->id ?>">Supprimer</a></button></td>
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