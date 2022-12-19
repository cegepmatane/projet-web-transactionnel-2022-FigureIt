<?php
session_start();
require_once "../config.php";
include SITEPATH . "accesseur/ClientDAO.php";

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

$dataRecue = json_decode(file_get_contents('php://input'), true);
// error_log(print_r($dataRecue, true));
$message = "";
$client = ClientDAO::findClientById($_SESSION['id']);

if (isset($dataRecue['identifiant'])){
    if (empty($dataRecue['identifiant'])) {
        $message = _('Identifiant requis.');

    }else{
        // Check si l'identifiant est deja utilise
        if (!empty(ClientDAO::findClientByName($dataRecue['identifiant']))){
            $message = _("Identifiant d&eacute;j&agrave; utilis&eacute;");
        }else{
            // Check si l'identifiant tapé respecte le filtre
            if (!filter_var($dataRecue['identifiant'], FILTER_SANITIZE_ENCODED)){
                $message = _("Mauvais format d'identifiant");
            }else{
                ClientDAO::updateClient($client->id, $dataRecue['identifiant'], $client->email, $client->motDePasse);
                $_SESSION['nom'] = $dataRecue['identifiant'];
                $message = _("Identifiant modifié");
            }
        }
    }
}elseif (isset($dataRecue['mail'])){
    if (empty($dataRecue['mail'])) {
        $message = _('Email requis');

    }else{
        // Check si l'email est deja utilise
        if (!empty(ClientDAO::findClientByEmail($dataRecue['mail']))){
            $message = _("Adresse mail d&eacute;j&agrave; utilis&eacute;e");
        }else{
            // Check si l'email respecte le filtre
            if (!filter_var($dataRecue['mail'], FILTER_SANITIZE_EMAIL)){
                $message = _("Mauvais format d'email");
            }else{
                ClientDAO::updateClient($client->id, $client->nom, $dataRecue['mail'], $client->motDePasse);
                $message = _("Email modifié");
            }
        }
    }

}elseif (isset($dataRecue['mdp'])){
    if (empty($dataRecue['mdp'])) {
        $message = _('Mot de passe requis');
    }else{
        // Check si il y a des espaces dans le nouveau mdp
        if(preg_match("/\s/", $dataRecue['mdp'])){
            $message = _("Le mot de passe contient des espaces");
        }else{
            if (!filter_var($dataRecue['mdp'], FILTER_SANITIZE_ENCODED)){
                $message = _("Mauvais format de mot de passe");
            }else{
                ClientDAO::updateClient($client->id, $client->nom, $client->email, password_hash($dataRecue['mdp'], PASSWORD_DEFAULT));
                $message = _("Mot de passe modifié");
            }
        }
    }
}else{
    $message = _("Un problème est survenu");
}

echo $message;