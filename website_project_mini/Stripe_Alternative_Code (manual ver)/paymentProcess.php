<?php
    use PHPMailer\PHPMailer\PHPMailer;

    $products = array(
        "pids" => ["1", "2", "3"],
        "1" => "plan_E4g2jsIPScZeH6",
        "2" => "plan_E7Hcdysyy9TU58",
        "3" => "plan_E7HdyXFDlTpQpb"
    );

    if (!isset($_GET['pid']) || !in_array($_GET['pid'], $products['pids']) || !isset($_POST['stripeToken']) || !isset($_POST['stripeEmail'])) {
        header('Location: prenumenera.php');
        exit();
    }

    require_once('stripe-php-6.24.0/init.php');

    $stripe = [
        "secret_key"      => "WRITE_STRIPE_SK",
        "publishable_key" => "WRITE_STRIPE_PK",
    ];

    \Stripe\Stripe::setApiKey($stripe['secret_key']);

    $pid = $_GET['pid'];
    $token  = $_POST['stripeToken'];
    $email  = $_POST['stripeEmail'];

    $customer = \Stripe\Customer::create([
        'email' => $email,
        'source'  => $token,
    ]);

    \Stripe\Subscription::create([
        "customer" => $customer->id,
        "items" => [
            [
                "plan" => $products[$pid],
            ],
        ]
    ]);

    $conn = new mysqli("localhost", "WRITE_USER", "WRITE_PASSWORD (if any)", "WRITE_DATABASE");
    $email = $conn->real_escape_string($email);

    $sql = $conn->query("SELECT id FROM users WHERE email='$email'");

    if ($sql->num_rows > 0) {
        $conn->query("UPDATE users SET plan='$pid' WHERE email='$email'");
    } 

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();
    $mail->Host = "smtp-mail.outlook.com"; //"smtp.gmail.com"
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "name@email.com";
    $mail->Password = "WRITE_PASSWORD";
    $mail->Port = 587; //465
    $mail->SMTPSecure = "tls";//ssl
    $mail->addAddress($email);
    $mail->setFrom("name@email.com", "NAME");
    $mail->isHTML(true);
    $mail->Subject = "Slutförd betalning";
    $mail->Body = "
        Hej,
        <br><br>
        Du har nu köpt en prenumeneration på <strong>WEBSITE</strong>. Du kan se filmerna nedan.<br><br>
        
        <a href='http://localhost/bibliotek.php'>Se filmer</a><br><br>
        
        Med vänliga hälsningar,<br>
        COMPANY
    ";

    header('Location: grattis_prenumenerat.php);
?>