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

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty(trim($_POST["connexion-email"])))
        {
            $email_err = _("Entrez un email");
        }
        else
        {
            $email = trim($_POST["connexion-email"]);
        }

        if(empty(trim($_POST["connexion-password"])))
        {
            $password_err = _("Entrez un mot de passe");
        }
        else
        {
            $password = trim($_POST["connexion-password"]);
        }

        if(empty($email_err) && empty($password_err))
        {
            $user = ClientDAO::findClientByEmail(trim($_POST['connexion-email']));

            $id = $user->id;
            $nom = $user->nom;
            $hashed_password = $user->motDePasse;
            if(password_verify($password, $hashed_password)){
                session_start();

                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["nom"] = $nom;
                $_SESSION["lastConnexion"] = time();

                header("location: ".SITE_URL);
            } else {
                $login_err = _("email ou mot de passe incorrect");
            }
        }
    }
?>
<div class="container justify-content-center">
    <div class="row mb-lg-5">
        <h2 class="d-inline-block text-center mx-lg-auto mt-lg-5 mt-md-3"><? _('Connexion') ?></h2>
    </div>
    <span class="form-errors"><?= $login_err?></span>
    <form action="#" method="post">
        <div class="row mx-lg-4 mb-3 px-5">
            <input type="email" class="form-control" placeholder=<? _('email') ?> name="connexion-email" id="connexion-email" value="<?= $email ?>" required>
            <span class="form-errors"><?= $email_err?></span>
        </div>
        <div class="row mx-lg-4 mb-3 px-5">
            <input type="password" class="form-control" placeholder=<? _('Mot de passe') ?> name="connexion-password" id="connexion-password" value="<?= $password ?>" required>
            <span class="form-errors"><?= $password_err ?></span>
        </div>
        <div class="row mt-lg-5 mx-lg-4 px-5 justify-content-center">
            <button class="btn btn-primary col-6" type="submit"><? _('Connexion') ?></button>
        </div>
    </form>
</div>

<?php
    include "footer.php";
?>
