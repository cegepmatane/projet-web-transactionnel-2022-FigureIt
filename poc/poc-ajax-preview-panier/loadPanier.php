<?php
session_start();

$panier = "";

if(!empty($_SESSION['panier'])){
    foreach ($_SESSION['panier'] as $item){
        $panier.= "<div>".$item['nom'].", ".$item['quantite']."</div>";
    }
}
echo $panier === "" ? "panier vide" : $panier;
