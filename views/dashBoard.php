<?php
session_start();
if (isset($_SESSION['account']) && $_SESSION['account']['roles'] == 2) { 
include_once $_SERVER['DOCUMENT_ROOT'].'/constants.php';
include_once SITE_ROOT.'controllers/dashBoardCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>TradiCeylon ADMIN</title>
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
       <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
       <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
       <link rel="stylesheet" href="../assets/css/style.css" />
    </head>
        <body>
            <header>
                <a class="btn btn-outline-primary btn-sm" href="../index.php" role="button"><i class="fas fa-store"></i> Retour au Boutique</a>
            </header>
                <div class="container text-center">
                <?php if(!isset($_SESSION['account'])){ //Si l'utilisateur n'est pas connecté ?>
                    <a href="../views/signIn.php?view=signIn" role="button" class="btn btn-primary btn-sm"><span title="Se connecter"><i class="fas fa-sign-in-alt"> Se connecter</i></span></a>     
                    <a href="../views/signUp.php?view=signUp" role="button" class="btn btn-primary-light btn-sm"><span title="s'inscrire"><i class="fas fa-user-plus"> S'inscrire</i></span></a>     
                    <?php }else{ //Si la personne est connectée?>
                    <a href="../views/dashBoard.php" role="button" class="btn btn-primary btn-sm"><?= isset($_SESSION['account']['userName']) ? ' Bonjour ' . $_SESSION['account']['userName']: ''?></a>
                    <a href="?action=disconnect" role="button" class="btn btn-primary btn-sm"><span title="Se deconnecter"><i class="fas fa-sign-out-alt"> Se deconnecter</i></span></a>     
                    <?php } ?>         
                    <h1 class="display-6"><?= isset($_SESSION['account']['userName']) ? 'Bienvenue à TradiCeylon Admin' . $_SESSION['profile']['userName']: ''?></h1>
                        <hr class="my-4">
                        <a class="btn btn-outline-primary" href="addProducts.php" role="button">Ajouter un Produit</a>
                        <a class="btn btn-outline-primary" href="../views/listeProducts.php" role="button">Lists des Products</a>
                        <a class="btn btn-outline-primary" href="../views/addCat.php" role="button">Ajouter un Category</a>
                        <hr class="my-4">
                        <a class="btn btn-outline-primary" href="../views/addProductEtCategory.php" role="button">Ajouter un Product et un Category</a>
                        <a class="btn btn-outline-primary" href="../views/listCat.php" role="button">Lists des Category</a>
                        <hr class="my-4">
                        <a class="btn btn-outline-primary" href="../views/listUsers.php" role="button">List des Clients</a>
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