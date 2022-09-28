<?php
$titre = "Admin_Ajout";
$pageActive = "admin_Ajout";

include "accesseur/FigurineDAO.php";
$figurine = FigurineDAO::ajouterFigurine($_REQUEST['titre'], $_REQUEST['prix'], $_REQUEST['quantite'], $_REQUEST['description'], $_REQUEST['image']);
?>
<?php header('Location: index.php'); ?>