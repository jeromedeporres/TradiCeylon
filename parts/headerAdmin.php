<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/constants.php';
include_once SITE_ROOT.'controllers/headerAdminCtrl.php';
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
        <script src="https://cdn.tiny.cloud/1/eyizwmb1zctgir73yin2ywd0i4codnsrhzb3hbamxrq11qok/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script> tinymce.init({selector: '#description'}) </script>
    </head>
        <body> 
            <div class="container-fluid">
                <header class="blog-header ml-auto mr-auto">
                    <div class="row flex-nowrap justify-content-between align-items-center">
                        <div class="col-12 text-center">
                            <a href="../index.php"><img alt="logo" src="../assets/img/logoo.png"class="logo" width="150" height="150"></a>
                                <?php if(!isset($_SESSION['account'])){ //Si l'utilisateur n'est pas connecté ?>
                                <a href="../views/signIn.php?view=signIn" role="button" class="btn btn-primary btn-sm"><span title="S'identifier"><i class="fas fa-sign-in-alt"> S'identifier</i></span></a>     
                                <a href="../views/signUp.php?view=signUp" role="button" class="btn btn-primary-light btn-sm"><span title="s'inscrire"><i class="fas fa-user-plus"> S'inscrire</i></span></a>     
                                <?php }else{ //Si la personne est connectée?>
                                <a href="../views/dashBoard.php" role="button" class="btn btn-primary btn-sm"><?= isset($_SESSION['account']['userName']) ? ' Bonjour ' . $_SESSION['account']['userName']: ''?></a>
                                <a href="?action=disconnect" role="button" class="btn btn-primary btn-sm"><span title="Se deconnecter"><i class="fas fa-sign-out-alt"> Se deconnecter</i></span></a>     
                                <?php } ?>  
                                <hr class="" />       
                            <a class="btn btn-outline-primary btn-sm " href="../views/dashBoard.php" role="button">Acceuil-Admin</a>
                            <a class="btn btn-outline-primary btn-sm" href="../views/addProducts.php" role="button">Ajouter un Product</a>
                            <a class="btn btn-outline-primary btn-sm" href="../views/listeProducts.php" role="button">Lists des Products</a>
                            <a class="btn btn-outline-primary btn-sm" href="../views/addCat.php" role="button">Ajouter un Category</a>
                            <a class="btn btn-outline-primary btn-sm" href="../views/addProductEtCategory.php" role="button">Ajouter un Product et un Category</a>
                            <a class="btn btn-outline-primary btn-sm" href="../views/listCat.php" role="button">Lists des Category</a>
                            <a class="btn btn-outline-primary btn-sm" href="../views/listUsers.php" role="button">Lists des Clients</a>
                    </div>
                </header>
            </div>
            <hr>