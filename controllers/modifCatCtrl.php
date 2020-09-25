<?php
if(isset($_GET['id'])){
    $categories = new categories();
    $updatedCategory = new categories();
    $categories->id = $_GET['id'];
    if($categories->getCatInfo()){
        $categories = $categories->getCatInfo();
    }else {
        $modifyCatMessageFail = 'Ce category n\'éxiste pas';
    } 
}
        
$formErrors = array();
if(isset($_POST['modify'])){

    //instancier notre requete de la class categories
    if(!empty($_POST['categoryName'])){
        //J'hydrate mon instance d'objet user
        $updatedCategory->categoryName = htmlspecialchars($_POST['categoryName']);
    }else{
        $formErrors['categoryName'] = 'Renseigner le nom de category' ;
    }

    if(empty($formErrors)){
        // On verify si le categoryName a été modifié
        if ($categories->categoryName != $updatedCategory->categoryName){
            //On vérifie si le pseudo est libre
            if($updatedCategory->checkCategoryExist()){
                $formErrors['categoryName'] = 'Le nom de category déja utilisé';
            }else {
                $updatedCategory->id = $_GET['id'];
                if($updatedCategory->modifyCatInfo()){
                    $message = 'Le category a bien été modifié';
                }else {
                    $message = 'pas update';
                }
            }
        }else{
            $message = 'Vous n\'avez rien changé';
        }
    }
}
