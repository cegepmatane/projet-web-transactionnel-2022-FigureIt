<?php
$titre = "AdminModifier";
$pageActive = "adminModifier";

include "accesseur/FigurineDAO.php";
$figurine = FigurineDAO::supprimerFigurine($_GET['id']);
?>
<?php header('Location: index.php'); ?>