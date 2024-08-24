<?php
session_start();

require('../../stripe-php-6.24.0/init.php');

$emailssst = $_SESSION["email"];
//echo $emailssst;

// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/account/apikeys
//TEST \Stripe\Stripe::setApiKey('WRITE_STRIPEAPIEKEY');
\Stripe\Stripe::setApiKey('WRITE_STRIPEAPIKEY_SK');

// If you are testing your webhook locally with the Stripe CLI you
// can find the endpoint's secret by running `stripe listen`
// Otherwise, find your endpoint's secret in your webhook settings in the Developer Dashboard
//TEST $endpoint_secret = 'WRITE_ENDPOINT_KEY_WSEC';
$endpoint_secret = 'WRITE_ENDPOINT_KEY_WHSEC';

$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
//http_response_code(200); // PHP 5.4 or greater`
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
switch ($event->type) {
    case 'payment_intent.succeeded':
        $sourcesss=$event->data->object->billing_details->email;
        $emailsssr = $_SESSION["email"];
        $conn = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");
        $sqll2 = "UPDATE winwinaccount SET plan=7 WHERE email='$sourcesss'";
        $conn->query ($sqll2);
        break;
    case 'payment_intent.payment_failed':
        $sourcesss=$event->data->object->billing_details->email;
        $emailsssr = $_SESSION["email"];
        $conn = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");
        $sqll2 = "UPDATE winwinaccount SET plan=6 WHERE email='$sourcesss'";
        $conn->query ($sqll2);
        break;
    case 'charge.succeeded':
        $sourcesss=$event->data->object->billing_details->email;
        $emailsssr = $_SESSION["email"];
        $conn = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");
        $sqll2 = "UPDATE winwinaccount SET plan=7 WHERE email='$sourcesss'";
        $conn->query ($sqll2);
        break;     
    case 'charge.failed':
        $sourcesss=$event->data->object->billing_details->email;
        $emailsssr = $_SESSION["email"];
        $conn = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");
        $sqll2 = "UPDATE winwinaccount SET plan=6 WHERE email='$sourcesss'";
        $conn->query ($sqll2);
        break;   
    case 'invoice.payment_succeeded':
        $sourcesss=$event->data->object->billing_details->email;
        $emailsssr = $_SESSION["email"];
        $conn = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");
        $sqll2 = "UPDATE winwinaccount SET plan=7 WHERE email='$sourcesss'";
        $conn->query ($sqll2);
        break;   
    case 'invoice.payment_failed':
        $sourcesss=$event->data->object->billing_details->email;
        $emailsssr = $_SESSION["email"];
        $conn = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");
        $sqll2 = "UPDATE winwinaccount SET plan=6 WHERE email='$sourcesss'";
        $conn->query ($sqll2);
        break;   
    // ... handle other event types
    default:
        echo 'Received unknown event type ' . $event->type;
}

http_response_code(200);

?> 




