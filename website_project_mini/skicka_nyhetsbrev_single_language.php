<?php
$val = 1;

  use PHPMailer\PHPMailer\PHPMailer;

        $body_comb = $body . ' ' . $email_real_send;

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

$mysqli = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");

$query1 = "SELECT COUNT(*) FROM users_en";
$result = mysqli_query($mysqli,$query1);
$rows = mysqli_fetch_row($result);
$total = $rows[0];

while ($val <= $total) {
    $email_send="SELECT email FROM users_en WHERE id='$val'";
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
        
        $subject = "Nyhetsbrev";
        $body = "
        Hej,
        <br><br>
        Nu finns nya episode av Casper på <strong>WEBSITE</strong>. Du kan se avsniten nedan.<br><br>
        
        <a href='http://website.com/bibliotek.php'>Se nya episode här.</a><br><br>
        
        Med vänliga hälsningar,<br>
        NAME
        <br><br>
       <br><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style=color:darkgray href='https://website.com/cancel_newsletter.php'>Avbryt nyhetsbrev</a>
    ";

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

echo "Nyhetsbreven har skickats. Totalt $total email-adresser.";


?>
