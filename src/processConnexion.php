<?php
require_once 'config.php';
include "accesseur/ClientDAO.php";

session_start();

$locale = $_SESSION['langue'];
if (defined('LC_MESSAGES')) {
    putenv("LANG=$locale");
    putenv("LANGUAGE=$locale");
    $domain = 'messages';
    setlocale(LC_MESSAGES, $locale); // Linux
    setlocale(LC_ALL, $locale);
    bindtextdomain($domain, PATHLOCALE );
    bind_textdomain_codeset($domain, 'UTF-8');
} else {
    putenv("LC_ALL=$locale"); // windows
    $domain = 'messages';
    textdomain($domain);
    bind_textdomain_codeset($domain, 'UTF-8');
}

$errors = [];
$data = [];
$receivedDATA = json_decode(file_get_contents('php://input'), true);
$identifiant = $email = $password = $passwordConfirm = "";

//var_dump($_POST);
$email = trim($receivedDATA["email"]);
$password = $receivedDATA["password"];
error_log(print_r($receivedDATA, true));

if (empty($receivedDATA['email'])) {
    $errors['email'] = _('Email requis');
}

if (empty($receivedDATA['password'])) {
    $errors['password'] = _('Mot de passe requis');
}

if(!empty($receivedDATA['email'])&&!empty($receivedDATA['password']))
{
        // Check si il y a des espaces dans un des mots de passe
        if(preg_match("/\s/", $password) || preg_match("/\s/", $passwordConfirm)){
            $errors['password'] = _("Le mot de passe contient des espaces");
        }

        if (empty($errors['email']) && empty($errors['password'])){
            $user = ClientDAO::findClientByEmail($email);

            $id = $user->id;
            $nom = $user->nom;
            $hashed_password = $user->motDePasse;
            if(password_verify($password, $hashed_password)){
                
    
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["nom"] = $nom;
                $_SESSION["lastConnexion"] = time();
    
                
            } else {
                $errors['login'] = _("email ou mot de passe incorrect");
            }
        }
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);