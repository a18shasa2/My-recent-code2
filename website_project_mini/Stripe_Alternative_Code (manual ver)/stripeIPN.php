<?php
	require_once "config.php";
    use PHPMailer\PHPMailer\PHPMailer;

	\Stripe\Stripe::setVerifySslCerts(false);

	// Token is created using Checkout or Elements!
	// Get the payment token ID submitted by the form:
	$productID = $_GET['id'];

	if (!isset($_POST['stripeToken']) || !isset($products[$productID])) {
		header("Location: pricing.php");
		exit();
	}

	$token = $_POST['stripeToken'];
	$email = $_POST["stripeEmail"];
    $conn = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD (if any)", "WRITE_DATABASE");

    $sqlll = $conn->query("SELECT id FROM users WHERE email='$email'");

    if ($sqlll->num_rows > 0) {
            $sqll2 = "UPDATE users SET plan=1 WHERE email='$email'";
            $conn->query ($sqll2);
            // Charge the user's card:
            $charge = \Stripe\Charge::create(array(
                "amount" => $products[$productID]["price"],
                "currency" => "sek",
                "description" => $products[$productID]["title"],
                "source" => $token,
            ));

            //send an email
            //store information to the database
            //echo 'Success! You have been charged $' . ($products[$productID]["price"]/100);

            $sql = "UPDATE users SET plan=2 WHERE email='$email'";

            $conn->query ($sql);
        
            $date_thirty = date('Y-m-d', strtotime("+30 days"));
        
            $date_new_store = "UPDATE users SET regDate='$date_thirty' WHERE email='$email'";
            $conn->query ($date_new_store); 

            //echo 'Plan has been updated!';
        
         require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();
    $mail->Host = "smtp-mail.outlook.com"; //"smtp.gmail.com"
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "name@email.com";
    $mail->Password = "Vj7ZPvnH";
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
        
            header ("Location: grattis_prenum.php");
        } 
    else{
         header ("Location: fel_email.php");
        } 
    

?>