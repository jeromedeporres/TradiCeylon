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
    $link = 'listeProducts.php?';
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
        if($categories->checkCategoriesExistByIdProducts()){
            if($categories->deleteCategoryByIdproducts()){
                $products->deleteProducts();
                header('Location: ' . $pageLink); 
            }else {
                $message = 'une erreur est survenue lors de la suppression';
            }
        }else {
            $patients->deleteProducts();
            header('Location: ' . $pageLink);  
        }
        
    }else {
        $message = 'erreur: produit introuvable';
    }   
}

$resultLimit = 5;
$pageLimit = ceil($products->resultNumber / $resultLimit);
$page = 0;
if(isset($_GET['page'])){
    $page = $_GET['page'] * $resultLimit;
    $pageLink = $link . '&page=' . $_GET['page'];
}else {
    $pageLink = $link;
}