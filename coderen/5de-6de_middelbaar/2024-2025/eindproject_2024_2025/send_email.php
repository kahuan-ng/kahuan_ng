<?php
$name = $_POST['frmNaam'];
$email = $_POST['frmEmailadres'];
$subject = $_POST['subject'];
$message = $_POST['message'];

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

/*$mail->SMTPDebug = SMTP::DEBUG_SERVER; 
*/
$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "send.one.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "info1@kahuansjsp.be";
$mail->Password = "Y4KAc4XU";

$mail->setFrom("info1@kahuansjsp.be", $name);       // Afzender = jouw domein
$mail->addReplyTo($email, $name);                  // Antwoorden naar de gebruiker
$mail->addAddress("kahuanng@gmail.com", "Ka-Huan"); // Ontvanger

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

echo "email sent";

?>