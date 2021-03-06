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
            $userAccount = $user->getUserAccount();
            //On met en session ses informations
            $_SESSION['account']['id'] = $userAccount->id;
            $_SESSION['account']['userName'] = $userAccount->userName;
            $_SESSION['account']['roles'] = $userAccount->id_roles;

            if($_SESSION['account']['roles'] == 1) {
                $userAccount->id_roles;
                header('location:../views/dashboardusers.php');
            }else {
            header('location:../views/dashBoard.php');
            //On redirige vers une autre page.
            }exit();
       }else{
           $formErrors['password'] = $formErrors['email'] = 'Veuillez renseigner vos identifiants valide';
       }
    }
}