<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/constants.php';
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
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&family=Philosopher&family=Tenali+Ramakrishna&family=Cinzel+Decorative:wght@900&family=Courgette&display=swap" rel="stylesheet">        
        <link rel="stylesheet" href="../assets/css/styles.css">
    </head>
    <body> 
      <div class="container-fluid d-none d-lg-block">
        <header class="blog-header py-2">
            <div class="row flex-nowrap justify-content-between align-items-center">
              <img src="../assets/img/upperNavBar.jpg" alt="imageUpperNavBar" id="imageUpperNavBar" />
              <div class="col-4 pt-1">
                <?php if(!isset($_SESSION['account'])){ //Si l'utilisateur n'est pas connecté ?>
                <a href="../views/signIn.php?view=signIn" role="button" class="btn btn-outline-light btn-sm"><span title="S'identifier"><i class="fas fa-sign-in-alt"> S'identifier</i></span></a>     
                <a href="../views/signUp.php?view=signUp" role="button" class="btn btn-outline-light btn-sm"><span title="s'inscrire"><i class="fas fa-user-plus"> S'inscrire</i></span></a>     
                <?php }else{ //Si la personne est connectée?>
                  <a href="../views/<?= (isset($_SESSION['account']) && $_SESSION['account']['roles'] == 2) ? 'dashBoard.php' :  'dashboardusers.php' ?> " role="button" class="btn btn-primary btn-sm"><?= isset($_SESSION['account']['userName']) ? ' Bonjour ' . $_SESSION['account']['userName']: ''?></a>
                  <a href="?action=disconnect" role="button" class="btn btn-outline-light btn-sm"><span title="Se deconnecter"><i class="fas fa-sign-out-alt"> Se deconnecter</i></span></a>     
                  <?php } ?>         
              </div>
                <div class="col-4 text-center">
                <img class="logo" href="../index.php" id="logo" src="../assets/img/logoo.png" alt="logo" height="150" width="150">
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                <button class="btn btn-outline-light" data-toggle="modal" data-target="#cart"><i class="fas fa-shopping-basket"></i>(<span class="total-count"></span>)</button>        
                </div>
            </div>
            <hr class="my-1">
      </div>
        <div class="container d-none d-lg-block" id="lowerNavBar">
          <nav class="nav navbar d-flex justify-content-between">
            <a class="p-2 text-light" href="../index.php"><i class="fas fa-home"></i><span class="sr-only">(current)</span></a>
            <?php foreach ($categoryList as $cat) {?>
              <a class="p-2 text-light text-uppercase" href="<?= $_SERVER['PHP_SELF'] != '/index.php' ? '../' : ''?>views/allProducts.php?id=<?= $cat->id ?>"><?= $cat->categoryName?></a>
            <?php } ?>
          </nav>
        </div>
          <nav class="navbar-expand-lg navbar-light bg-transparent d-block d-lg-none" id="NavBarM">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon text-light"></span>
            </button>
              <a class="navbar-brand mx-auto" href="../index.php"><img class="logo" id="logo" src="../assets/img/logoo.png" alt="logo" height="75" width="75"></a>
              <?php if(!isset($_SESSION['account'])){ //Si l'utilisateur n'est pas connecté ?>
                <a href="../views/signIn.php?view=signIn" role="button" class="btn btn-outline-light btn-sm"><span title="S'identifier"><i class="fas fa-sign-in-alt"> S'identifier</i></span></a>     
                <a href="../views/signUp.php?view=signUp" role="button" class="btn btn-outline-light btn-sm"><span title="s'inscrire"><i class="fas fa-user-plus"> S'inscrire</i></span></a>     
                <?php }else{ //Si la personne est connectée?>
                  <a href="../views/<?= (isset($_SESSION['account']) && $_SESSION['account']['roles'] == 2) ? 'dashBoard.php' :  'dashboardusers.php' ?> " role="button" class="btn btn-primary btn-sm"><?= isset($_SESSION['account']['userName']) ? ' Bonjour ' . $_SESSION['account']['userName']: ''?></a>
                  <a href="?action=disconnect" role="button" class="btn btn-outline-light btn-sm"><span title="Se deconnecter"><i class="fas fa-sign-out-alt"> Se deconnecter</i></span></a>     
                  <?php } ?>         
              <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav mr-auto">
                <a class="p-2 text-light" href="../index.php"><i class="fas fa-home"></i><span class="sr-only">(current)</span></a>
                <?php foreach ($categoryList as $cat) {?>
                  <li class="nav-item active"><a class="nav-link p-2 text-light text-uppercase" href="<?= $_SERVER['PHP_SELF'] != '/index.php' ? '../' : ''?>views/allProducts.php?id=<?= $cat->id ?>"><?= $cat->categoryName?></a></li>
                <?php } ?>
              </ul>
            </div>
          </nav>
      </header>