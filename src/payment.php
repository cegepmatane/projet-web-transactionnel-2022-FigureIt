<?php
require_once '../vendor/stripe/stripe-php/init.php';

$payment_id = $statusMsg = '';
$ordStatus = 'error';

if(!empty($_POST['stripeToken'])){
    $token = $_POST['stripeToken'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    require_once 'stripe-php/init.php';
    \Stripe\Stripe::setApiKey('sk_test_51Lz4VfGWo3ZJVZgp13hLyctWj0pUBdwbSmNNcd7c0qkd4Oycx5GnsBix0590TIoWBFKl12nHH25w34CxUKKvzL0u00AXaa2tvP');
    $endpoint_secret = 'whsec_Mr8ntiRjJJupS2d1316LgCqZK0TYNdLO';

    $payload = @file_get_contents('php://input');
    $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    $event = null;

    try {
      $event = \Stripe\Webhook::constructEvent(
        $payload, $sig_header, $endpoint_secret
      );
    } catch(\UnexpectedValueException $e) {
      // Invalid payload
      http_response_code(400);
      exit();
    } catch(\Stripe\Exception\SignatureVerificationException $e) {
      // Invalid signature
      http_response_code(400);
      exit();
    }

    // Handle the event
    echo 'Received unknown event type ' . $event->type;
    switch ($event->type) {
      case "checkout.session.completed" :
        $session = $event->data->object;
        echo 'session' . $session;
      break;
      default :
        echo 'Received unknown event type ' . $event->type;
      break;
    }

    http_response_code(200);


}