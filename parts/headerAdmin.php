<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
include_once SITE_ROOT.'models/categories.php';
include_once SITE_ROOT.'controllers/headerCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <title>Tradiceylon</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/styles.css">
    </head>
    <body> 
        <div class="container-fluid">
            <header class="blog-header ml-auto mr-auto">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-12 text-center">
                    <a href="../index.php"><img alt="logo" src="../assets/img/logoo.png"class="logo" width="150" height="150"></a>
                        <?php if(!isset($_SESSION['profile'])){ //Si l'utilisateur n'est pas connecté ?>
                        <a href="../views/signIn.php?view=signIn" class="btn btn-outline-primary"><span title="Se connecter"><i class="fas fa-sign-in-alt"></i></span></a>     
                        <a href="../views/signUp.php?view=SignUp" class="btn btn-outline-primary"><span title="Créer mon compte"><i class="fas fa-user-plus"></i></span></a>     
                        <?php }else{ //Si la personne est connectée?>
                        <a href="../index.php?action=disconnect" class="btn btn-outline-primary"><span title="Se deconnecter"><i class="fas fa-sign-out-alt"></i></span></a>     
                        <?php } ?>         
                        <a class="btn btn-outline-primary btn-sm " href="../views/dashboard.php" role="button">Acceuil-Admin</a>
                        <a class="btn btn-outline-primary btn-sm" href="../views/addProducts.php" role="button">Ajouter un Product</a>
                        <a class="btn btn-outline-primary btn-sm" href="../views/listeProducts.php" role="button">Lists des Products</a>
                        <a class="btn btn-outline-primary btn-sm" href="../views/addCategory.php" role="button">Ajouter un Category</a>
                        <a class="btn btn-outline-primary btn-sm" href="../views/addProductEtCategory.php" role="button">Ajouter un Product et un Category</a>
                        <a class="btn btn-outline-primary btn-sm" href="../views/listCategories.php" role="button">Lists des Category</a>
                        <a class="btn btn-outline-primary btn-sm" href="../views/listClients.php" role="button">Lists des Clients</a>
                </div>
            </header>
        </div>
        <hr>