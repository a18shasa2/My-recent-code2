<?php
//Norska
$val = 1;

  use PHPMailer\PHPMailer\PHPMailer;

        $body_comb = $body . ' ' . $email_real_send;

        require "PHPMailer/PHPMailer.php";
        require "PHPMailer/SMTP.php";
        require "PHPMailer/Exception.php";

$mysqli = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");

$query1 = "SELECT COUNT(*) FROM users_no";
$result = mysqli_query($mysqli,$query1);
$rows = mysqli_fetch_row($result);
$total = $rows[0];

while ($val <= $total) {
    $email_send="SELECT email FROM users_no WHERE id='$val'";
    $result1 = mysqli_query($mysqli,$email_send);
    $rows1 = mysqli_fetch_row($result1);
    $email_real_send = $rows1[0];
    //echo $email_real_send;
    //"$email_real_send" indicates the email-adresses.
    //Nedan skickar email
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
        
        $subject = "Nyhetsbrev_norska";
        $body = "Nyhetsbrev123123åäö";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom("info@prototype.com", "WRITE_NAME");
        //$mail->addAddress(address: "WRITE_OTHEREMAIL");
        $mail->addAddress($email_real_send);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
    
     $val++;
}

echo "Nyhetsbreven_norska har skickats. Totalt $total email-adresser.";

//Svenska
$val = 1;

        $body_comb = $body . ' ' . $email_real_send;


$mysqli = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");

$query1 = "SELECT COUNT(*) FROM users_se";
$result = mysqli_query($mysqli,$query1);
$rows = mysqli_fetch_row($result);
$total = $rows[0];

while ($val <= $total) {
    $email_send="SELECT email FROM users_se WHERE id='$val'";
    $result1 = mysqli_query($mysqli,$email_send);
    $rows1 = mysqli_fetch_row($result1);
    $email_real_send = $rows1[0];
    //echo $email_real_send;
    //"$email_real_send" indicates the email-adresses.
    //Nedan skickar email
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
        
        $subject = "Nyhetsbrev_svenska";
        $body = "Nyhetsbrev123123åäö";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom("info@prototype.com", "WRITE_NAME");
        //$mail->addAddress(address: "WRITE_OTHEREMAIL");
        $mail->addAddress($email_real_send);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
    
     $val++;
}

echo "Nyhetsbreven_svenska har skickats. Totalt $total email-adresser.";


?>
