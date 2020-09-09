<?php
$formErrors = [];
//Vérification du formulaire de connexion
if(isset($_POST['login'])){
    $user = new users();
    if(!empty($_POST['email'])){
        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            //J'hydrate mon instance d'objet user
            $user->email = htmlspecialchars($_POST['email']);
        }else{
            $formErrors['email'] = 'Renseigner un adress mail valide';
        }
    }else{
        $formErrors['email'] = 'Renseigner votre adress mail';
    }

    if(empty($_POST['password'])){        
        $formErrors['password'] = 'Renseigner un mot de passe';
    }
    
    if(empty($formErrors)){
        //On récupère le hash de l'utilisateur
       $hash = $user->getUserPasswordHash();
       //Si le hash correspond au mot de passe saisi
       if(password_verify($_POST['password'], $hash)){
           //On récupère son profil
            $userProfil = $user->getUserProfile();
            //On met en session ses informations
            $_SESSION['profile']['id'] = $userProfil->id;
            $_SESSION['profile']['userName'] = $userProfil->userName;
            //On redirige vers une autre page.
            header('location:../views/dashboard.php');
            exit();
       }else{
           $formErrors['password'] = $formErrors['email'] = 'Veuillez renseigner vos identifiants valide';
       }
    }
}