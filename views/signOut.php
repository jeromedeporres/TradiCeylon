<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/constants.php';
include '../parts/header.php';
include_once '../models/users.php';
?>
    <div class="jumbotron text-center" id="compteUser">
        <h1 class="display-4"><?= isset($_SESSION['account']['userName']) ? 'A bientôt ' . $_SESSION['account']['userName']: ''?></h1>
            <p class="lead">Vous êtes déconnecté</p>
            <hr class="my-4">
    </div>
<?php include '../parts/footer.php';