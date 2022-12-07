<?php
require_once "config.php";
include "accesseur/ClientDAO.php";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
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
