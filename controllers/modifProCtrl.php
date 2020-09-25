<?php
$regexPrice = '^([1-9]|([1-9][0-9]+))\.[0-9]{2}$^';
$regexName = '^([A-ÿ0-9\ \%\-\.\/\,\;\:\!\?\(\)\'\"\€\&])+$^';
$regexRef = '^[[:alnum:]]+^';
$formErrors = array();
$categories = new categories();
$categoryList = $categories->getCategory();

if (isset($_GET ['id'])) {
    $product = new products();
    $product ->id = htmlspecialchars($_GET['id']);
    $productsInfo = $product->getProductInfo();
}
if (isset($_POST['modifyProduct'])) {
    if (!empty($_POST['NomdeProduit'])) {
        if (preg_match($regexName, $_POST['NomdeProduit'])) {
            $product->productName = htmlspecialchars($_POST['NomdeProduit']);
        }else {
                $formErrors['productName'] = 'Le text est pas valide';
        }
    } else {
        $formErrors['NomdeProduit'] = 'L\'information n\'est pas renseigné';
    }
    if (!empty($_POST['Description'])) {
        if (preg_match($regexName, $_POST['Description'])) {
            $product->description = htmlspecialchars($_POST['Description']);
        }else {
            $formErrors['Description'] = 'Le text est pas valide';
        }
    } else {
        $formErrors['Description'] = 'L\'information n\'est pas renseigné';
    }
    if (!empty($_POST['REF'])) {
        if (preg_match($regexRef, $_POST['REF'])) {
            $product->productReference = htmlspecialchars($_POST['REF']);
        }else {
            $formErrors['REF'] = 'Le text est pas valide';
        }
    } else {
        $formErrors['REF'] = 'L\'information n\'est pas renseigné';
    }
    if (!empty($_POST['PRIX'])) {
        if (preg_match($regexPrice, $_POST['PRIX'])) {
            $product->price = htmlspecialchars($_POST['PRIX']);
        }else {
            $formErrors['PRIX'] = 'Le text est pas valide';
        }
    } else {
        $formErrors['PRIX'] = 'L\'information n\'est pas renseigné';
    }
    if (!empty($_FILES['Image']) && $_FILES['Image']['error'] == 0) {
        // On stock dans $fileInfos les informations concernant le chemin du fichier.
        $fileInfos = pathinfo($_FILES['Image']['name']);
        // On crée un tableau contenant les extensions autorisées.
        $fileExtension = ['jpg', 'jpeg', 'png','JPG','JPEG', 'PNG'];
        // On verifie si l'extension de notre fichier est dans le tableau des extension autorisées.
        if (in_array($fileInfos['extension'], $fileExtension)) {
          //On définit le chemin vers lequel uploader le fichier
          $path = '../assets/img/';
          //On crée une date pour différencier les fichiers
          $date = date('Y-m-d_H-i-s');
          //On crée le nouveau nom du fichier (celui qu'il aura une fois uploadé)
          $fileNewName = $_FILES['Image']['name'];
          //On stocke dans une variable le chemin complet du fichier (chemin + nouveau nom + extension une fois uploadé) Attention : ne pas oublier le point
          $productPhoto = $path . $fileNewName ;
          //move_uploaded_files : déplace le fichier depuis son emplacement temporaire ($_FILES['file']['tmp_name']) vers son emplacement définitif ($fileFullPath)
          if (move_uploaded_file($_FILES['Image']['tmp_name'], $productPhoto)) {
            //On définit les droits du fichiers uploadé (Ici : écriture et lecture pour l'utilisateur apache, lecture uniquement pour le groupe et tout le monde)
            chmod($productPhoto, 0644);
            $product->image = $productPhoto;
          }else {
            $formErrors['Image'] = 'Votre fichier ne s\'est pas téléversé correctement';
          }
        }else {
          $formErrors['Image'] = 'Votre fichier n\'est pas du format attendu';
        }
    }else {
        $formErrors['Image'] = 'Veuillez selectionner un fichier';
    }
    if(!empty($_POST['id_categories'])){
        $categories->id = htmlspecialchars($_POST['id_categories']);
        if($categories->getCategory()){
            $product->id_categories = $categories->id;
        }else {
            $formErrors['id_categories'] = 'Une erreur s\'est produite';
        }
    }else {
        $formErrors['id_categories'] = 'Vous n\'avez pas sélectionné le category';
    }
    if (empty($formErrors)) {
        if (!$product->checkProductsExist()){
            if($product->modifyProductInfo()){
                $ModifProMessage = 'le product a été modifié.'; 
            } else {
                $ModifProMessage = 'Une erreur est survenue.';
            }
        } else {
            $ModifProMessage = 'Le product a déjà été modifié.';
        }
    }
}