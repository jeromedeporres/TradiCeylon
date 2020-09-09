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
      <div class="container">
          <header class="blog-header py-2">
            <div class="row flex-nowrap justify-content-between align-items-center">
              <div class="col-4 pt-1">
                <?php if(!isset($_SESSION['profile'])){ //Si l'utilisateur n'est pas connecté ?>
                <a href="../views/signIn.php?view=signIn" class="btn btn-outline-primary"><span title="Se connecter"><i class="fas fa-sign-in-alt"></i></span></a>     
                <a href="../views/signUp.php?view=SignUp" class="btn btn-outline-primary"><span title="Créer mon compte"><i class="fas fa-user-plus"></i></span></a>     
                <?php }else{ //Si la personne est connectée?>
                  <a href="../index.php?action=disconnect" class="btn btn-outline-primary"><span title="Se deconnecter"><i class="fas fa-sign-out-alt"></i></span></a>     
                  <?php } ?>         
              </div>
                <div class="col-4 text-center">
                <img class="logo" href="../index.php" src="../assets/img/logoo.png" alt="logo" height="150" width="150">
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#cart"><i class="fas fa-shopping-basket"></i>(<span class="total-count"></span>)</button>        
                </div>
            </div>
            <hr class="my-1">
      </div>
            <div class="container" id="navBar">
              <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted" href="../index.php"><i class="fas fa-home"></i><span class="sr-only">(current)</span></a>
                <?php foreach ($categoryList as $cat) {?>
                  <a class="p-2 text-muted" href="<?= SITE_URL ?>views/allProducts.php?id=<?= $cat->id ?>"><?= $cat->categoryName?></a>
                <?php } ?>
              </nav>
            </div>
          </header>
      </div>