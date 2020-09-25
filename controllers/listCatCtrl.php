<?php
$categories = new categories();
if(isset($_POST['sendSearch'])){
    $search = htmlspecialchars($_POST['search']);
    
    $resultsNumber = $categories->countSearchResult($search);
    $link = 'listcat.php?search=' . $_GET['search'] . '&sendSearch=';
    if($resultsNumber == 0 ){
        $searchMessage = 'Aucun resultat ne correspond à votre recherche';
    }else{
        $searchMessage = 'Il y a ' . $resultsNumber . ' résultats';
        $CategoryList = $categories->searchCatListByName($search);
    }
}else{
    $categoryList = $categories->getCategory();
    $resultsNumber = count($categoryList);
    $searchMessage = 'Il y a ' . $resultsNumber . ' categories';
    $link = 'listCat.php?';
}

if(!empty($_GET['idDelete'])){
    $categories->id = htmlspecialchars($_GET['idDelete']);
}else if(!empty($_POST['idDelete'])){
    $categories->id = htmlspecialchars($_POST['idDelete']);
}else {
    $deleteMessage = 'Aucun utilisateur n\'a été sélectionné';
}
if(isset($_POST['confirmDelete'])){
               if($categories->deleteCat());
                header('location:../views/listCat.php'); 
            }else {
                $message = 'une erreur est survenue lors de la suppression';       
    }