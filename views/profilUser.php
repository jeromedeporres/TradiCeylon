<?php
session_start();
if (isset($_SESSION['account']) && $_SESSION['account']['roles'] == 2) {
include '../parts/headerAdmin.php';
include_once '../models/users.php';
include '../controllers/profilUsersCtrl.php'; 
?>
    <div class="card border-primary mx-auto" style="width: 30rem;">
        <div class="card-header border-primary text-primary">
            <h4 class="card-title">Fiche Utilisateur</h4>
        </div>
            <div class="card-body">
                <?php if(isset($usersInfo)){ ?>
                    <p class="card-text">Id: <?= $usersInfo->id ?></p>
                    <p class="card-text">Nom : <?= $usersInfo->userName ?></p>
                    <p class="card-text">Adresse mail : <?= $usersInfo->email ?></p><?php
                }else { ?>
                    <p class="card-text"><?= $message ?></p><?php
                } ?>
                    <a href="modifUserProfil.php?&id=<?= $users->id ?>" class="btn btn-primary btn-sm">Modifier le profile</a>
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