<?php
    session_start();
	$productID = $_GET['id'];

    if ($_GET['id'] !== "3") {
        header('Location: prenumenera_subscribe_checkout.php');
        exit();
    }

    $emailsss = $_SESSION["email"];

    //$conn = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");
    //$sqll2 = "UPDATE users SET plan=2 WHERE email='$emailsss'";
    //$conn->query ($sqll2);


use PHPMailer\PHPMailer\PHPMailer;

        $email = $emailsss;
        $body = "
        Hello,
        <br><br>
        You have now bought a subscription to <strong>WEBSITE</strong>. You can watch the movies below.<br><br>
        
        <a href='http://website.com/en/library.php'>Watch the movies here.</a><br><br>
        
        Regards,<br>
        NAME
    ";
        $body_comb = $body;

        require_once "../PHPMailer/PHPMailer.php";
        require_once "../PHPMailer/SMTP.php";
        require_once "../PHPMailer/Exception.php";

        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "prime2.inleed.net";
        $mail->SMTPAuth = true;
        $mail->Username = "info@prototype.com";
        $mail->Password = 'WRITE_EMAILPASSWORD';
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls
        $subject = "Thank you for purchase";
        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom("info@prototype.com", "WRITE_NAME");
        $mail->addAddress($emailsss);
        $mail->Subject = $subject;
        $mail->Body = $body_comb;
        $mail->addAttachment('logo.png', 'logo.png');

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }



    unset($_SESSION['loggedIn']);
    session_destroy();
    header('Location: grattis_prenumenerat.php');
    exit(json_encode(array("status" => $status, "response" => $response)));
    header('Location: grattis_prenumenerat.php');
?>