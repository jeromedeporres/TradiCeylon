<?php
if(!empty($_GET['id'])){
    $products = new products();
    $products->id = htmlspecialchars($_GET['id']);
    if($products->checkIdProductsExist()){
        $productsInfo = $products->getProductInfo(); 
    }else {
        $message = 'Une erreur s\'est produite';
    }
}