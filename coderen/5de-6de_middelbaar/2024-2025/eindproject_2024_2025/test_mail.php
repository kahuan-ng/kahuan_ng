<?php
$to = "jouw_email@voorbeeld.com"; // VERVANG dit met je EIGEN e-mailadres
$subject = "Test E-mail van PHP";
$message = "Dit is een test e-mail om te controleren of de PHP mail() functie werkt.";
$headers = "From: webmaster@jouwdomein.com" . "\r\n" . // VERVANG dit met een geldig adres op je domein
           "Reply-To: webmaster@jouwdomein.com" . "\r\n" .
           "X-Mailer: PHP/" . phpversion();

if (mail($to, $subject, $message, $headers)) {
    echo "Test e-mail succesvol verzonden. Controleer je inbox (en spam map!).";
} else {
    echo "Fout: Het verzenden van de test e-mail is mislukt. Controleer je serverconfiguratie en logs.";
}
?>