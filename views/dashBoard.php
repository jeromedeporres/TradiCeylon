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
                    <h1 class="display-6">Bienvenue a TradiCeylon Admin</h1>
                        <hr class="my-4">
                        <a class="btn btn-outline-primary" href="addProducts.php" role="button">Ajouter un Produit</a>
                        <a class="btn btn-outline-primary" href="../views/listeProducts.php" role="button">Lists des Products</a>
                        <a class="btn btn-outline-primary" href="../views/addCategory.php" role="button">Ajouter un Category</a>
                        <hr class="my-4">
                        <a class="btn btn-outline-primary" href="../views/addProductEtCategory.php" role="button">Ajouter un Product et un Category</a>
                        <a class="btn btn-outline-primary" href="../views/listCategories.php" role="button">Lists des Category</a>
                        <hr class="my-4">
                        <a class="btn btn-outline-primary" href="../views/listClients.php" role="button">List des Clients</a>
                </div>
<?php 
include '../parts/footer.php';