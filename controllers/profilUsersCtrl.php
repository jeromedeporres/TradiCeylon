<?php
if(!empty($_GET['id'])){
    $users = new users();
    $users->id = htmlspecialchars($_GET['id']);
    if($users->checkIdUsersExist()){
        $usersInfo = $users->getProfilUser(); 
    }else {
        $message = 'Une erreur s\'est produite';
    }
}