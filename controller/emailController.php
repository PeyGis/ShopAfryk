<?php 
require_once((dirname(__FILE__)).'/../vendor/autoload.php');

function sendEmail(){
//PHPMailer Object
$mail = new PHPMailer;

//From email address and name
$mail->From = "shopafryk@gmail.com";
$mail->FromName = "Full Name";

//To address and name
$mail->addAddress("isaac.p.coffie@gmail.com", "Recepient Name");
//$mail->addAddress("recepient1@example.com"); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo("shopafryk@gmail.com", "Reply");

//CC and BCC
//$mail->addCC("cc@example.com");
//$mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}
}

sendEmail();
 ?>