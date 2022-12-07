<?php
     $titre = "Success";
     $pageActive = "success";
     include "header.php";
include "accesseur/CommandeDAO.php";

foreach($_SESSION['panier'] as $item)
{
    CommandeDAO::ajouterCommande(time(),date("d-m-Y", strtotime(time())), $item["quantite"],$item["id"],$_SESSION["id"]);
}

$_SESSION['panier'] = [];
 ?>
 <div class="thanks"><?= _('Nous vous remercions pour votre achat') ?></div>
 <a href="index.php" class="btn btn-primary mt-md-6 mt-sm-3 mb-3"><?= _('Retour à l\'accueil') ?></a>