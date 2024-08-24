<?php
    session_start();

    $emailsss = $_SESSION["email"];

    $conn = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");
    $sqll22 = "UPDATE users SET plan=1 WHERE email='$emailsss'";
    $conn->query ($sqll22);

    use PHPMailer\PHPMailer\PHPMailer;

        $email = $emailsss;
        $subject = "Avslutad prenumeneration";
        $body = "Avslutad prenumeneration";
        $body_comb = $body . ' ' . $emailsss;

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

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($emailsss, "Avslutad prenumuneration");
        $mail->addAddress("info@prototype.com");
        $mail->Subject = $subject;
        $mail->Body = $body_comb;

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }


    unset($_SESSION['loggedIn']);
    session_destroy();
    header('Location: not_logged_in.php');
    exit(json_encode(array("status" => $status, "response" => $response)));
    header('Location: not_logged_in.php');
?>