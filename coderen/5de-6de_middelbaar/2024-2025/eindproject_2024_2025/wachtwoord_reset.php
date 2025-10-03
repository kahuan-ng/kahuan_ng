<?php
session_start();
include "../connect2db.inc"; // voeg deze regel toe om database te kunnen gebruiken

$token = $_GET['token'] ?? '';
if (!$token) {
    $_SESSION['error'] = "Geen geldige token meegegeven.";
    header("Location: wachtwoord_vergeten.php");
    exit;
}

// ➤ HASH de token die in de URL zit
$token_hash = hash("sha256", $token);

// ➤ Zoek in de database naar de gebruiker met deze gehashte token
$sql = "SELECT * FROM gebruikers WHERE reset_token = ? AND reset_token_expires_at > NOW() LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    $_SESSION['error'] = "Ongeldige of verlopen token.";
    header("Location: wachtwoord_vergeten.php");
    exit;
}
// Optioneel: $gebruiker = $result->fetch_assoc(); // als je de gebruiker later wil gebruiken
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Wachtwoord vergeten</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body style="background-color: #e0f2f1; color: #263238;">

<header class="w3-bar w3-padding-16" style="background-color: #2e4a4e; color: white; display: flex; align-items: center; justify-content: center; position: relative;">
    <a href="index.php" style="position: absolute; left: 16px; display: flex; align-items: center;">
        <img src="hypermobility_logo.png" alt="Hypermobility Central Logo" style="height: 50px; margin-bottom: 2px;">
    </a>
    
    <h1 style="margin: 0; font-size: 24px;">Wachtwoord Resetten</h1>
    </header>

<div class="w3-container w3-display-middle" style="max-width: 400px;">
    <div class="w3-card-4 w3-white">
        <div class="w3-container" style="background-color: #2e4a4e; color: white;">
            <h3>Reset je wachtwoord</h3>
        </div>

        <form class="w3-container w3-padding" method="post" action="update_nieuwe_wachtwoord.php">
            <!-- Verborgen token input -->
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

            <?php if (isset($_SESSION['error'])): ?>
                <div class="w3-panel w3-red w3-round w3-padding">
                    <?= htmlspecialchars($_SESSION['error']) ?>
                    <?php unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <label for="frmNieuweWachtwoord"><b>Wachtwoord</b></label>
            <input class="w3-input w3-border w3-round" type="password" name="frmNieuweWachtwoord" id="frmNieuweWachtwoord" required>

            <label for="frmControleWachtwoord"><b>Controle wachtwoord</b></label>
            <input class="w3-input w3-border w3-round" type="password" name="frmControleWachtwoord" id="frmControleWachtwoord" required>

            <input class="w3-button w3-block w3-margin-top w3-round" type="submit" value="Wachtwoord resetten"
                   style="background-color: #00ff9d; color: #2e4a4e;">
        </form>
    </div>
</div>

<footer class="w3-bar w3-bottom w3-center w3-padding-16" style="background-color: #2e4a4e; color: white;">
    <p>© 2025 Hypermobility Central</p>
</footer>

</body>
</html>