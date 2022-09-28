<?php
$titre = "Admin_Modifie";
$pageActive = "admin_Modifie";

include "accesseur/FigurineDAO.php";
$figurine = FigurineDAO::modifierFigurine($_GET['id'], $_REQUEST['titre'], $_REQUEST['prix'], $_REQUEST['quantite'], $_REQUEST['description'], $_REQUEST['image']);
?>
<?php header('Location: index.php'); ?>