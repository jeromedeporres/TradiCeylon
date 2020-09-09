<?php
$products = new products();
if (!empty($_GET['id'])){
    $categories = new categories();
    $categories->id = htmlspecialchars($_GET['id']);
    if($categories->checkCategoriesExist()){
        $products->id_categories = $categories->id;
        $productDetails = $products->getProductsByCategory();
    }else {
        $message = 'Une erreur s\'est produite';
    }
}else {
    $products->id_categories = 1;
    $productDetails = $products->getProductsByCategory();
}