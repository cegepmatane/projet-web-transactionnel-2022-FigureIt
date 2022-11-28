<?php
    include "accesseur/ClientDAO.php";
    $titre = "Inscription";
    $pageActive = "inscription";
    include "header.php";


    $identifiant = $email = $password = $passwordConfirm = "";
    $err_identifiant = $err_email = $err_password = $err_passwordConfirm = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //var_dump($_POST);
        $identifiant = trim($_POST["inscription-identifiant"]);
        $email = trim($_POST["inscription-email"]);
        $password = $_POST["inscription-password"];
        $passwordConfirm = $_POST["inscription-confirm-password"];

        // Check si l'identifiant est deja utilise
        if (!empty(ClientDAO::findClientByName($identifiant))){
            $err_identifiant =  _('Identifiant d&eacute;j&agrave; utilis&eacute;');
        }

        // Check si l'email est deja utilise
        if (!empty(ClientDAO::findClientByEmail($email))){
            $err_email =  _('Adresse mail d&eacute;j&agrave; utilis&eacute;e');
        }
        //var_dump($err_email);

        // Check si les deux mots de passe sont les memes
        if(strcmp($password, $passwordConfirm) !== 0){
            $err_passwordConfirm = _("Les deux mots de passe de correspondent pas");
        }

        // Check si il y a des espaces dans un des mots de passe
        if(preg_match("/\s/", $password) || preg_match("/\s/", $passwordConfirm)){
            $err_password = _("Le mot de passe contient des espaces");
        }

        if (empty($err_identifiant) && empty($err_email) && empty($err_password) && empty($err_passwordConfirm)){
            ClientDAO::ajouterClient($identifiant, $email, password_hash($passwordConfirm, PASSWORD_DEFAULT));
            header("location: connexion.php");
        }
    }
?>
<div class="container justify-content-center">
    <div class="row mb-lg-5">
        <h2 class="d-inline-block text-center mx-lg-auto mt-lg-5 mt-md-3"><? _('Inscription') ?></h2>
    </div>
    <form action="#" method="post">
        <div class="row mx-lg-4 mb-3 px-5">
            <input type="text" class="form-control" placeholder=<? _('Identifiant') ?> name="inscription-identifiant" id="inscription-identifiant" value="<?= $identifiant?>" required>
            <span class="form-errors"><?= $err_identifiant?></span>
        </div>
        <div class="row mx-lg-4 mb-3 px-5">
            <input type="email" class="form-control" placeholder=<? _('email') ?> name="inscription-email" id="inscription-email" value="<?= $email ?>" required>
            <span class="form-errors"><?= $err_email ?></span>
        </div>
        <div class="row mx-lg-4 mb-3 px-5">
            <input type="password" class="form-control" placeholder=<? _('Mot de passe') ?> name="inscription-password" id="inscription-password" required>
            <span class="form-errors"><?= $err_password ?></span>
        </div>
        <div class="row mx-lg-4 mb-3 px-5">
            <input type="password" class="form-control" placeholder=<? _('Confirmer le mot de passe') ?> name="inscription-confirm-password" id="inscription-confirm-password" required>
            <span class="form-errors"><?= $err_passwordConfirm ?></span>
        </div>
        
        <div class="row mt-lg-5 mx-lg-4 px-5 justify-content-center">
            <button class="btn btn-primary col-6" type="submit"><? _('Inscription') ?></button>
        </div>
    </form>
</div>

<?php
    include "footer.php";
?>
