<?php
$products = new products();
$categories = new categories();

if(isset($_POST['sendSearch'])){
    $search = htmlspecialchars($_POST['search']);
    
    $resultsNumber = $products->countSearchResult($search);
    
    
    $link = 'listeProducts.php?search=' . $_GET['search'] . '&sendSearch=';
    if($resultsNumber == 0){
        $searchMessage = 'Aucun resultat ne correspond à votre recherche';
    }else{
        $searchMessage = 'Il y a ' . $resultsNumber . ' résultats';
        $productsList = $products->searchProductsListByName($search);
    }
}else{
    $productsList = $products->getProductsList();
    $resultsNumber = count($productsList);
    $searchMessage = 'Il y a ' . $resultsNumber . ' products';
    $link = 'listeProducts.php';
}


if(!empty($_GET['idDelete'])){
    $products->id = htmlspecialchars($_GET['idDelete']);
}else if(!empty($_POST['idDelete'])){
    $products->id = htmlspecialchars($_POST['idDelete']);
}else {
    $deleteMessage = 'Aucun produit n\'a été sélectionné';
}
if(isset($_POST['confirmDelete'])){
    if($products->checkIdProductsExist()){
        $categories->idProducts = $products->id;
        $products->deleteProduct();
    }else {
        $message = 'une erreur est survenue lors de la suppression';
    }
}