<?php
    if(isset($_GET['id'])){
        $users = new users();
        $users->id = $_GET['id'];
    if($users->getProfilUser()){
        $usersInfo = $users->getProfilUser();
    }else {
        $modifyUserMessageFail = 'Ce utilisateur n\'éxiste pas';
    } 
}       
        $formErrors = array();
if(isset($_POST['modify'])){
    //instancier notre requete de la class users
    if(!empty($_POST['email'])){
        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            //J'hydrate mon instance d'objet user
            $users->email = htmlspecialchars($_POST['email']);
        }else{
            $formErrors['email'] ='Renseigner un adress mail valide';
        }
    }else{
        $formErrors['email'] = 'Renseigner votre adress mail';
    }

    if(!empty($_POST['userName'])){
        //J'hydrate mon instance d'objet user
        $users->userName = htmlspecialchars($_POST['userName']);
    }else{
        $formErrors['userName'] = 'Renseigner votre nom d\'utilisateur';
    }
    if(empty($formErrors)){
        $isOk = true;
                // On verify si le username a été modifié
        if ($usersInfo->userName != $_POST['userName']){
            //On vérifie si le pseudo est libre
            if($users->checkUserUnavailabilityByFieldName(['userName'])){
                $formErrors['userName'] = 'Votre nom d\'utilisateur déja pris';
                $isOk = false;
            }
        } 
        // On verify si le mail a été modifié
        if ($usersInfo->email != $_POST['email']){
            //On vérifie si le mail est libre
            if($users->checkUserUnavailabilityByFieldName(['email'])){
                $formErrors['email'] = 'Votre adress mail déja pris';
                $isOk = false;
            }
        }
        //Si c'est bon on ajoute l'utilisateur
        if($isOk){
            $users->modifyUserProfil();
            $modifyUserMessageSuccess = 'Le utilisateur a bien été modifié';
        }
    }
}
