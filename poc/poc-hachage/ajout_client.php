<?php
$titre = "Ajout_client";
$pageActive = "AJOUT_CLIENT";

include "../../src/admin/accesseur/ClientDAO.php";
$client = ClientDAO::ajouterClient($_REQUEST['nom'], $_REQUEST['email'], password_hash($_REQUEST['motDePasse'], PASSWORD_DEFAULT));
?>
<?php header('Location: index.php'); ?>