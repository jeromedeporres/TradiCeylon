<?php
include '../parts/header.php';
include_once '../models/users.php';
include_once '../controllers/signUpCtrl.php';

if(isset($signUpMessageFail)){ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $signUpMessageFail ?>
    </div>
<?php } 
if(isset($signUpMessageSuccess)){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $signUpMessageSuccess ?>
    </div>
<?php } ?>
<div class="container" id="signUp">
    <form action="#" method="POST">
        <div class="form-group">
            <h1 class="text-center">Créer Mon Compte</h1>
            <label for="userName">Nom d'utilisateur :</label>
            <input type="text" class="form-control" id="userName" aria-describedby="usernameHelp" name="userName" onblur="checkUnavailability(this)"/>
            <?php if(isset($formErrors['userName'])){ ?>
                <p class="text-danger"><?= $formErrors['userName'] ?></p>
           <?php }else{ ?>
                <small id="usernameHelp" class="form-text text-muted">Merci de renseigner votre nom d'utilisateur</small>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="email">Adresse mail :</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" onblur="checkUnavailability(this)"/>
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
        <div class="form-group">
            <label for="passwordVerify">Mot de passe (confirmation) :</label>
            <input type="password" class="form-control" id="passwordVerify" aria-describedby="passwordVerifyHelp" name="passwordVerify" />
            <?php if(isset($formErrors['passwordVerify'])){ ?>
                <p class="text-danger"><?= $formErrors['passwordVerify'] ?></p>
           <?php }else{ ?>
                <small id="passwordVerifyHelp" class="form-text text-muted">Merci de confirmer votre mot de passe</small>
                <?php } ?>
        </div>
        <button type="submit" name="register" class="btn btn-primary">Je m'inscris</button>       
    </form>
</div>
<?php include '../parts/footer.php';