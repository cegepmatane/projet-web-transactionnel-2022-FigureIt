<?php
session_start();
require_once "config.php";
include "accesseur/FigurineDAO.php";
$panier = "";
$total = 0;

if (isset($_POST["radioLangue"])) {
    $_SESSION['langue'] = $_POST["radioLangue"];
    $locale = $_POST["radioLangue"];
}else{
    if(isset($_SESSION['langue'])){
        $locale = $_SESSION['langue'];
    }else{
        $_SESSION['langue'] = "fr_FR.utf-8";
        $locale = "fr_FR.utf-8";
    }
}

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
