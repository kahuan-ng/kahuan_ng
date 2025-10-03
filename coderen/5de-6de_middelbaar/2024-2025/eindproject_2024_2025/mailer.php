<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

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


$mail-> isHtml(true);

return $mail;
?>