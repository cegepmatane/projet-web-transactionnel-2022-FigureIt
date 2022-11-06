<?php
session_start();
require '../vendor/stripe/stripe-php/init.php'; 
$montant = 'price_1LzkEHGWo3ZJVZgpYeTaMmCn';//$_POST['montant'];
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51Lz4VfGWo3ZJVZgp13hLyctWj0pUBdwbSmNNcd7c0qkd4Oycx5GnsBix0590TIoWBFKl12nHH25w34CxUKKvzL0u00AXaa2tvP');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://erreur404.space/transaction';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => $montant,
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.php',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);