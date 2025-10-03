<?php
$email = $_POST["email"] ?? '';
$gebruikersnaam = $_POST["gebruikersnaam"] ?? '';  // dit moet je toevoegen, bijvoorbeeld in je formulier

require __DIR__ . "/../connect2db.inc";

$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$sql = "UPDATE gebruikers
        SET reset_token = ?,
            reset_token_expires_at = ?
        WHERE gebruikersnaam = ? AND emailadres = ?";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Fout in SQL voorbereiding: " . $conn->error);
}

$stmt->bind_param("ssss", $token_hash, $expiry, $gebruikersnaam, $email);
$stmt->execute();

if ($stmt->affected_rows) {
    require __DIR__ . "/mailer.php";

    $base_url = "https://kahuansjsp.be/kahuan_ng/2024-2025/eindproject_2024_2025/";

    $mail->setFrom("info1@kahuansjsp.be", "Hypermobility Central");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->isHTML(true);
    $mail->Body = <<<END
    Klik <a href="{$base_url}wachtwoord_reset.php?token=$token">hier</a> om je wachtwoord te resetten.
END;

    try {
        $mail->send();
        echo "E-mail verstuurd. Check je inbox.";
    } catch (Exception $e) {
        echo "Kan de e-mail niet versturen. Mailer error: {$mail->ErrorInfo}";
    }
} else {
    echo "Geen gebruiker gevonden met dit e-mailadres en gebruikersnaam.";
}

$stmt->close();
$conn->close();
?>
