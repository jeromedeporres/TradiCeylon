<?php
//Choix de la vue à afficher et configuration du titre
if(isset($_GET['view'])){
    if($_GET['view'] == 'register'){
        $view = 'register';
        $title = REGISTER_TITLE;
    }else if($_GET['view'] == 'login'){
        $view = 'login';
        $title = LOGIN_TITLE;
    }
}
