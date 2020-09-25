<?php
$formErrors = array();
$categories = new categories();
if (isset($_POST['addCategory'])) {
    if (!empty($_POST['CategoryName'])) {
            $categories->categoryName = htmlspecialchars($_POST['CategoryName']);
    } else {
        $formErrors['CategoryName'] = 'L\'information n\'est pas renseigné';
    }
    // Validation//
    if (empty($formErrors)) {
        if (!$categories->checkCategoryExist()){
            if($categories->addCategory()){
                $addCategoryMessageSuccess = 'le category a bien été ajouté.'; 
            } else {
                $addCategoryMessageFail = 'Une erreur est survenue.';
            }
        } else {
            $addCategoryMessageFail = 'Le category existe.';
        }
    }    
}