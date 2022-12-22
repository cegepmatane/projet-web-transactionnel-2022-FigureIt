<?php
    $titre = "Connexion";
    $pageActive = "connexion";
    include "header.php";
    include "accesseur/ClientDAO.php";
    

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        header("location: ".SITE_URL);
        exit;
    }

    $email = $password = "";
    $email_err = $password_err = $login_err = "";

?>
<div class="container justify-content-center">
    <div class="row mb-lg-5">
        <h2 class="d-inline-block text-center mx-lg-auto mt-lg-5 mt-md-3"><?= _('Connexion') ?></h2>
    </div>
    <span class="form-errors"><?= $login_err?></span>
    <form action="actionConnexion.php" method="post" id="form">
        <div class="row mx-lg-4 mb-3 px-5">
            <input type="email" class="form-control" placeholder="<?= _('Email') ?>" name="connexion-email" id="connexion-email" value="<?= $email ?>" >
            <span class="form-errors" id="email-error"><?= $email_err?></span>
        </div>
        <div class="row mx-lg-4 mb-3 px-5">
            <input type="password" class="form-control" placeholder="<?= _('Mot de passe') ?>" name="connexion-password" id="connexion-password" value="<?= $password ?>">
            <span class="form-errors" id="password-error"><?= $password_err ?></span>
        </div>
        <div class="row mx-lg-4 mb-3 px-5">
            <input type="hidden" class="form-control" placeholder="<?= _("submit") ?>" name="submit" id="submit">
            <span class="form-errors col-6" id="connexion-error"><?= $login_err?></span>
        </div>
        <div class="row mt-lg-5 mx-lg-4 px-5 justify-content-center">
            <input class="btn btn-primary col-6" type="submit" value="<?= _('Connexion') ?>"></input>
        </div>
    </form>
</div>
<script src="formConnexion.js"></script>
<?php
    include "footer.php";
?>
