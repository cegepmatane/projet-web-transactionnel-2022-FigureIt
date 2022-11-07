<?php
session_start();
require_once 'config.php';
include "accesseur/FigurineDAO.php";
$panier = array();
if(isset($_GET['id'])){
  $idFigurine = filter_var($_GET['id'], FILTER_VALIDATE_INT);
  $figurine = FigurineDAO::findFigurineById($idFigurine);
  $panier[0]['price'] = $figurine->__get("lien_stripe");
  $panier[0]['quantity'] = 1;
} else{
  //var_dump($_SESSION['panier']);
  foreach ($_SESSION['panier'] as $item){
      $figurine = FigurineDAO::findFigurineById($item['id']);
      $array = array();
      $array['price'] = $figurine->__get("lien_stripe");
      $array['quantity'] = $item['quantite'];
      $panier[] = $array;
  }
  var_dump($panier);
}


require '../vendor/stripe/stripe-php/init.php'; 
$montant = $figurine->lien_stripe;//$_POST['montant'];
echo $montant;
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51Lz4VfGWo3ZJVZgp13hLyctWj0pUBdwbSmNNcd7c0qkd4Oycx5GnsBix0590TIoWBFKl12nHH25w34CxUKKvzL0u00AXaa2tvP');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://figureit.fr/';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [
    [$panier]
    ],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN,
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);