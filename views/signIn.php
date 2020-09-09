<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
include_once '../models/users.php';
include_once '../controllers/signInCtrl.php';
include '../parts/header.php';
?>
<div class="container" id="signIn">
    <form action="#" method="POST">
        <div class="form-group">
            <h1 class="text-center"> Connexion </h1>
            <label for="email">Adresse mail :</label>
            <input type="eemail" class="form-control" id="email" aria-describedby="emailHelp" name="email"/>
            <?php if(isset($formErrors['email'])){ ?>
                <p class="text-danger"><?= $formErrors['email'] ?></p>
           <?php }else{ ?>
                <small id="emailHelp" class="form-text text-muted">Merci de renseigner votre adresse mail</small>
           <?php } ?>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" name="password" />
            <?php if(isset($formErrors['password'])){ ?>
                <p class="text-danger"><?= $formErrors['password'] ?></p>
           <?php }else{ ?>
                <small id="passwordHelp" class="form-text text-muted">Merci de renseigner votre mot de passe</small>
                <?php } ?>
        </div>
        <button type="submit" name="login" class="btn btn-primary">Se Connecter</button>
    </form>
</div>
<?php include '../parts/footer.php';