<?php
session_start();
include '../parts/header.php';
include_once '../models/users.php';
?>
    <div class="jumbotron text-center" id="compteUser">
        <h1 class="display-4"><?= isset($_SESSION['account']['userName']) ? 'Bienvenue ' . $_SESSION['account']['userName']: ''?></h1>
            <p class="lead">cette page est en cours de construction.</p>
            <hr class="my-4">
            <p>A trés bientôt.</p>
    </div>
<?php include '../parts/footer.php';