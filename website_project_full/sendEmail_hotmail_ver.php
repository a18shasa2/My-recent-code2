<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];
        $body_comb = $body . ' ' . $email . ' ' . $name;

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp-mail.outlook.com";
        $mail->SMTPAuth = true;
        $mail->Username = "info@email.com";
        $mail->Password = 'WRITE_PASSWORD';
        $mail->Port = 587; //587
        $mail->SMTPSecure = "tls"; //tls

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom("info@email.com", "NAME");
        $mail->addAddress(address: "info@email.com");
        $mail->Subject = $subject;
        $mail->Body = $body_comb;

        if ($mail->send()) {
            $status = "success";
            $response = "Meddelandet har skickats!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
        exit(json_encode(array("status" => $status, "response" => $response)));
    }
?>
