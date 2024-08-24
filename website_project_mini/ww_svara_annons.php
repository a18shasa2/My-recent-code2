<?php
    session_start();

    $emailsss_from = $_SESSION["email"];

	$productID = $_GET['id'];

	$emailsss_to = $_GET['email'];

	$title = "ANNONS SVAR - " . $_GET['title'];

	$title_single = $_GET['title'];

    //$conn = mysqli_connect ("localhost", "cartoonwor", "MLO2ySn2mJnxx3lqQ0pm", "cartoonwor_databas");
    //$sqll2 = "UPDATE users SET plan=2 WHERE email='$emailsss'";
    //$conn->query ($sqll2);


use PHPMailer\PHPMailer\PHPMailer;

        $email = $emailsss;
        $body = "
        Hej,
        <br><br>
        En person med email-adressen <strong>$emailsss_from</strong> har svarat på annonsen <strong>$title_single</strong><br><br>
        
        <a href='http://website.com/annons_article.php?id=$productID'>Se alla dina svar här.</a><br><br>
        
        Med vänliga hälsningar,<br>
        Win Win
    ";
        $body_comb = $body;

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "prime2.inleed.net";
        $mail->SMTPAuth = true;
        $mail->Username = "info@email.com";
        $mail->Password = 'WRITE_PASSWORD';
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls
        $subject = $title;
        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom("info@email.com", "COMPANY");
        $mail->addAddress($emailsss_to);
        $mail->Subject = $subject;
        $mail->Body = $body_comb;
        $mail->addAttachment('en/logo.png', 'Company_Logo_Name.png');

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }


//INSERT INTO
        $connection = new mysqli("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");
        $plan = "1";
        $data = $connection->query("INSERT INTO winwinsvara (email, product_code, plan) VALUES ('$emailsss_from', '$productID', '$plan')");


    header('Location: en/svarat_annons.php');
    exit(json_encode(array("status" => $status, "response" => $response)));
    header('Location: en/svarat_annons.php');
?>