<?php
$titre = "Connexion_client";
$pageActive = "CONNEXION_CLIENT";

include "../../src/admin/accesseur/ClientDAO.php";
$client = ClientDAO::findClientByEmail($_REQUEST['email']);
echo $client->nom;
echo "</br> Mot de passe enregistre : " . $client->motDePasse;
echo "</br> Mot de passe entre : " . $_REQUEST['motDePasse'];
echo "</br>";
if(password_verify( $_REQUEST['motDePasse'], $client->motDePasse)){
    echo "Connexion réussie";
}else{
    echo "Connexion échouée";
}
?>
