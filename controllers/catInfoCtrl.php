<?php
if(!empty($_GET['id'])){
    $categories = new categories();
    $categories->id = htmlspecialchars($_GET['id']);
    if($categories->checkIdCatExist()){
        $categoriesInfo = $categories->getCatInfo(); 
    }else {
        $message = 'Une erreur s\'est produite';
    }
}