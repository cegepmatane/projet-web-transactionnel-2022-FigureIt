<?php
$titre = "Admin_Modifie";
$pageActive = "admin_Modifie";

require_once "../config.php";
include SITEPATH."admin/accesseur/FigurineDAO.php";
$figurine = FigurineDAO::modifierFigurine($_GET['id'], $_REQUEST['titre'], $_REQUEST['prix'], $_REQUEST['vendeurId'], $_REQUEST['quantite'], $_REQUEST['description'], $_REQUEST['image']);
?>
<?php header('Location: index.php'); ?>