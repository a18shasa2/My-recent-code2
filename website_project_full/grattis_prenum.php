<?php
    session_start();
	$productID = $_GET['id'];

    if ($_GET['id'] !== "3") {
        header('Location: prenumenera_subscribe_checkout.php');
        exit();
    }

    $emailsss = $_SESSION["email"];

    $current_date=Date('d/m/Y');

    //$conn = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD (if any)", "WRITE_DATABASE");
    //$sqll2 = "UPDATE users SET plan=2 WHERE email='$emailsss'";
    //$conn->query ($sqll2);


// START PDF-MAKING
require_once '../se/kvitto/TCPDF-main/tcpdf.php';
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->AddPage();
 
$html = '<table class="body-wrap"> <tbody><tr> <td></td> <td class="container" width="300"> <div class="content"> <table class="main" width="100%" cellpadding="0" cellspacing="0"> <tbody><tr> <td class="content-wrap aligncenter"> <table width="100%" cellpadding="0" cellspacing="0"> <tbody><tr> <td class="content-block"> <h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tack för köp!</strong></h2> </td> </tr> <tr> <td class="content-block"> <table class="invoice"> <tbody><tr> <td>Kvitto<br>Transaktion #10<br>' . $current_date . '</td> </tr> <tr> <td> <table class="invoice-items" cellpadding="0" cellspacing="0"> <tbody><tr> <td>Prenumeration (CWP)</td> <td class="alignright">69.00 SEK</td> </tr> <tr> <td>Moms (25%)</td> <td class="alignright">17.25 SEK</td> </tr>         <tr> <td>-----------------------------------</td><td class="alignright">---------------</td></tr>                   <tr> <td><strong>Totalt</strong></td> <td class="alignright"><strong>69.00 SEK</strong></td> </tr>    <tr> <td>Ditt kort</td> <td class="alignright">-69.00 SEK</td> </tr>    </tbody></table> </td> </tr> </tbody></table> </td> </tr> <tr> <td class="content-block">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="website.com">Se streamingtjänst</a> </td> </tr> <tr> <td class="content-block"> COMPANY - 559295-4001 - <br> Nälberg Lötåsen 224, 692 93 Kumla </td> </tr> </tbody></table> </td> </tr> </tbody></table> <div class="footer"> <table width="100%"> <tbody><tr> <td class="aligncenter content-block">&nbsp;&nbsp;Tel. NUMBER <br>&nbsp;&nbsp;Email <a href="mailto:">info@prototype.com</a><br><br><img height="60" class="mb-2" width="195" alt="" src="logo_1_lyllos_org.png"></td> </tr> </tbody></table> </div></div> </td> <td></td> </tr> </tbody></table>';
 
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->Output(__DIR__ . '/receipt/receipt.pdf', 'F');
//END PDF-MAKING



use PHPMailer\PHPMailer\PHPMailer;

        $email = $emailsss;
        $body = "
        Hello,
        <br><br>
        You have now bought a subscription to <strong>WEBSITE</strong>. You can watch the movies below.<br><br>
        
        <a href='http://website.com/en/library.php'>Watch the movies here.</a><br><br>
        
        Regards,<br>
        COMPANY
        <br><br><img oncontextmenu='return false;' height='60' class='mb-2' width='195' alt='PHPMailer' src='https://website.com/se/logo_1_lyllos_org.png'>
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
        $mail->Password = 'WRITE_PASSWORD';
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls
        $subject = "Thank you for purchase";
        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom("info@prototype.com", "COMPANY");
        $mail->addAddress($emailsss);
        $mail->Subject = $subject;
        $mail->Body = $body_comb;
        $mail->addAttachment('receipt/receipt.pdf', 'receipt.pdf');

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }



    unset($_SESSION['loggedIn']);
    session_destroy();
    header('Location: subscription_success.php');
    exit(json_encode(array("status" => $status, "response" => $response)));
    header('Location: subscription_success.php');
?>