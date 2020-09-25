<?php
session_start();
if (isset($_SESSION['account']) && $_SESSION['account']['roles'] == 2) {
include '../parts/headerAdmin.php';
include_once '../models/users.php';
include '../controllers/modifUserCtrl.php'; 

if(isset($modifyUserMessageFail)){ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $modifyUserMessageFail ?>
    </div>
<?php } 
if(isset($modifyUserMessageSuccess)){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $modifyUserMessageSuccess ?>
    </div>
<?php } ?>
<div class="content" id="modifUserProfil"><?php
    if(isset($usersInfo)){ ?>
    <form class="offset-4 col-4" action="modifUserProfil.php?&id=<?= $users->id ?>" method="POST">
        <div class="form-group">
            <label for="userName">Nom :</label>
            <input id="userName" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['userName']) ? 'is-invalid' : 'is-valid') : '' ?>" value="<?= isset($_POST['userName']) ? $_POST['userName'] : $usersInfo->userName ?>" type="text" name="userName" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['userName']) ? $formErrors['userName'] : '' ?></p>
        </div>
        <div class="form-group">
            <label for="email">E-mail :</label>
            <input id="email" class="form-control <?= count($formErrors) > 0 ? (isset($formErrors['email']) ? 'is-invalid' : 'is-valid') : ' ' ?>" value="<?= isset($_POST['email']) ? $_POST['email'] : $usersInfo->email ?>" type="email" name="email" />
            <!--message d'erreur-->
            <p class="errorForm"><?= isset($formErrors['email']) ? $formErrors['email'] : '' ?></p>
        </div>
        <input type="submit" class="btn btn-primary" name="modify" value="Enregistrer"></input>
        <p class="formOk"><?= isset($modifyUserMessage) ? $modifyUserMessage : ' ' ?>  </p><?php
        }else { ?>
            <p><?= $message ?></p><?php
        } ?>
    </form>
</div>
<?php include '../parts/footer.php';
    }else { 
        include '../parts/header.php';       
        ?>
    <div class="jumbotron" style="color: red; text-align:center;">
        <h1 class="display-4">Accès Restreint</h1>
            <p class="lead">Accès réservé au personnel autorisé! Veuillez contacter le service technique</p>
            <hr class="my-4">
    </div>
<?php } ?>