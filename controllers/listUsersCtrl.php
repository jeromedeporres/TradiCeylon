<?php
$users = new users();
if(isset($_POST['sendSearch'])){
    $search = htmlspecialchars($_POST['search']);
    
    $resultsNumber = $users->countSearchResult($search);
    
    
    $link = 'listUsers.php?search=' . $_GET['search'] . '&sendSearch=';
    if($resultsNumber == 0 ){
        $searchMessage = 'Aucun resultat ne correspond à votre recherche';
    }else{
        $searchMessage = 'Il y a ' . $resultsNumber . ' résultats';
        $usersList = $users->searchUsersListByName($search);
    }
}else{
    $usersList = $users->getUsersList();
    $resultsNumber = count($usersList);
    $searchMessage = 'Il y a ' . $resultsNumber . ' utilisateurs';
    $link = 'listUsers.php?';
}

if(!empty($_GET['idDelete'])){
    $users->id = htmlspecialchars($_GET['idDelete']);
}else if(!empty($_POST['idDelete'])){
    $users->id = htmlspecialchars($_POST['idDelete']);
}else {
    $deleteMessage = 'Aucun utilisateur n\'a été sélectionné';
}
if(isset($_POST['confirmDelete'])){
               if($users->deleteUsers());
                header('location:../views/listUsers.php'); 
            }else {
                $message = 'une erreur est survenue lors de la suppression';       
    }