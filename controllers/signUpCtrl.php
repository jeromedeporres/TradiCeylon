<?php
$formErrors = [];
//Vérification du formulaire d'inscription
if(isset($_POST['register'])){
    $user = new users();
    /**
     * Cette variable sert à savoir si les vérifications du mot de passe et de sa confirmation se sont déroulés avec succès
     */
    $isPasswordOk = true;
    if(!empty($_POST['email'])){
        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            //J'hydrate mon instance d'objet user
            $user->email = htmlspecialchars($_POST['email']);
        }else{
            $formErrors['email'] ='Renseigner un adress mail valide';
        }
    }else{
        $formErrors['email'] = 'Renseigner votre adresse mail';
    }

    if(!empty($_POST['userName'])){
        //J'hydrate mon instance d'objet user
        $user->userName = htmlspecialchars($_POST['userName']);
    }else{
        $formErrors['userName'] = 'Renseigner votre nom d\'utilisateur';
    }

    if(empty($_POST['password'])){
        $formErrors['password'] = 'Renseigner un mot de passe';
        $isPasswordOk = false;
    }
    if(empty($_POST['passwordVerify'])){
        $formErrors['passwordVerify'] = 'Confirmez votre mot de passe';
        $isPasswordOk = false;
    }
    //Si les vérifications des mots de passe sont ok
    if($isPasswordOk){
        if($_POST['passwordVerify'] == $_POST['password']){
            //On hash le mot de passe avec la méthode de PHP
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }else{
            $formErrors['password'] = $formErrors['passwordVerify'] = 'Les mots de passe doivent être identiques';
        }
    }
    if(empty($formErrors)){
        $isOk = true;
        //On vérifie si le pseudo est libre
        if($user->checkUserUnavailabilityByFieldName(['userName'])){
            $formErrors['userName'] = 'Votre nom d\'utilisateur déja pris';
            $isOk = false;
        }
        //On vérifie si le mail est libre
        if($user->checkUserUnavailabilityByFieldName(['email'])){
            $formErrors['email'] = 'Votre adress mail déja pris';
            $isOk = false;
        }
        //Si c'est bon on ajoute l'utilisateur
        if($isOk){
            if ($user->addUser()) {
                $signUpMessageSuccess = ' Vous etre bien crée votre compte';
            }else {
                $signUpMessageFail = ' Une erreur est survenu';
            }
        }
    }
}
//Traitement de la demande AJAX
if(isset($_POST['fieldValue'])){
    //On vérifie que l'on a bien envoyé des données en POST
    if(!empty($_POST['fieldValue']) && !empty($_POST['fieldName'])){
        //On inclut les bons fichiers car dans ce contexte ils ne sont pas connu.
        include_once '../constants.php';
        include_once '../models/users.php';
        $user = new users();
        $input = htmlspecialchars($_POST['fieldName']);
        $user->$input = htmlspecialchars($_POST['fieldValue']);
        //Le echo sert à envoyer la réponse au JS
        echo $user->checkUserUnavailabilityByFieldName([htmlspecialchars($_POST['fieldName'])]);
    }else{
        echo 2;
    }
}

?>