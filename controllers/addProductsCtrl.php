<?php
if(isset($_GET['action'])){
    if($_GET['action'] == 'disconnect'){
        //Pour deconnecter l'utilisateur on détruit sa session
        session_destroy();
        //Et on le redirige vers l'accueil
        header('location:/');
        exit();
    }
}
$regexPrice = '^([1-9]|([1-9][0-9]+))\.[0-9]{2}$^';
$regexName = '^([A-ÿ0-9\ \%\-\.\/\,\;\:\!\?\(\)\'\"\€\&])+$^';
$regexRef = '^[[:alnum:]]+^';
$formErrors = array();
//instancier notre requete de la class categories
$categories = new categories();
$categoryList = $categories->getCategory();
if (isset($_POST['addProduct'])) {
//instancier notre requete de la class products
    $product = new products();
//verification formulaire pour ajouter un product
    if (!empty($_POST['productName'])) {
// //si une valeur existe, verifier qu'elle soit en accord avec la regex
//         if (preg_match($regexName, $_POST['productName'])) {
//si tout est ok, stocker la valeur dans dans une variable
            $product->productName = htmlspecialchars($_POST['productName']);
//             var_dump($productName);
// //si une valeur existe mais qu'elle est non conforme a la regex, afficher le message d'erreur suivant : 
//         } else {
//             $formErrors['productName'] = 'Le text est pas valide';
//         }
//si aucune valeur n'est entrée, afficher le message d'erreur suivant :
    } else {
        $formErrors['productName'] = 'L\'information n\'est pas renseigné';
    }

    if (!empty($_POST['description'])) {
        // if (preg_match($regexName, $_POST['description'])) {
            $product->description = $_POST['description'];
        // } else {
        //     $formErrors['description'] = 'Le text est pas valide';
        // }
    } else {
        $formErrors['description'] = 'L\'information n\'est pas renseigné';
    }
    if (!empty($_POST['productReference'])) {
        if (preg_match($regexRef, $_POST['productReference'])) {
            $product->productReference = htmlspecialchars($_POST['productReference']);
        } else {
            $formErrors['productReference'] = 'Le text est pas valide';
        }
    } else {
        $formErrors['productReference'] = 'L\'information n\'est pas renseigné';
    }
    if (!empty($_POST['price'])) {
        if (preg_match($regexPrice, $_POST['price'])) {
            $product->price = htmlspecialchars($_POST['price']);
        } else {
            $formErrors['price'] = 'Le text est pas valide';
        }
    } else {
        $formErrors['price'] = 'L\'information n\'est pas renseigné';
    }
    if (!empty($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // On stock dans $fileInfos les informations concernant le chemin du fichier.
        $fileInfos = pathinfo($_FILES['image']['name']);
        // On crée un tableau contenant les extensions autorisées.
        $fileExtension = ['jpg', 'jpeg', 'png','JPG','JPEG', 'PNG'];
        // On verifie si l'extension de notre fichier est dans le tableau des extension autorisées.
        if (in_array($fileInfos['extension'], $fileExtension)) {
          //On définit le chemin vers lequel uploader le fichier
          $path = '../assets/img/';
          //On crée une date pour différencier les fichiers
          $date = date('Y-m-d_H-i-s');
          //On crée le nouveau nom du fichier (celui qu'il aura une fois uploadé)
          $fileNewName = $_FILES['image']['name'];
          //On stocke dans une variable le chemin complet du fichier (chemin + nouveau nom + extension une fois uploadé) Attention : ne pas oublier le point
          $productPhoto = $path . $fileNewName ;
          //move_uploaded_files : déplace le fichier depuis son emplacement temporaire ($_FILES['file']['tmp_name']) vers son emplacement définitif ($fileFullPath)
          if (move_uploaded_file($_FILES['image']['tmp_name'], $productPhoto)) {
            //On définit les droits du fichiers uploadé (Ici : écriture et lecture pour l'utilisateur apache, lecture uniquement pour le groupe et tout le monde)
            chmod($productPhoto, 0644);
            $product->image = $productPhoto;
          }else {
            $formErrors['image'] = 'Votre fichier ne s\'est pas téléversé correctement';
          }
        }else {
          $formErrors['image'] = 'Votre fichier n\'est pas du format attendu';
        }
    }else {
        $formErrors['image'] = 'Veuillez selectionner un fichier';
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
//on appelle la methode de notre model pour creer un nouveau product dans la base de données
        if (!$product->checkProductsExist()){
            if($product->addProduct()){
               $addproductMessage = 'le product a été ajouté.'; 
            } else {
                $addproductMessage = 'Une erreur est survenue.';
            }
        } else {
            $addproductMessage = 'Le product a déjà été ajouté.';
        }
    }
}