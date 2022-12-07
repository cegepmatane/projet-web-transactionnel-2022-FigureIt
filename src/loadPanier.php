<?php
session_start();
require_once "config.php";
include "accesseur/FigurineDAO.php";
$panier = "";
$total = 0;

if(!empty($_SESSION['panier'])){
    foreach ($_SESSION['panier'] as $item){
        $figurine = FigurineDAO::findFigurineById($item['id']);
        error_log(print_r($item, true));
        $total += $figurine->prix;
        $panier.= "<div>".formater($figurine->titre)." - ".$item['quantite']."</div>";
    }
    $panier .= "<div class='panier-preview-prix'>"._("Total : ").$total."$</div>";
    $panier .= "<a href='".SITE_URL."panier.php' class='btn btn-primary bt-sm'>"._("Achetez maintenant")."</a>";
}
echo $panier === "" ? _("panier vide") : $panier;
