<?php
session_start();
include "../connect2db.inc";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $gebruikersnaam = mysqli_real_escape_string($conn, $_POST['gebruikersnaam'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');

    $query = "SELECT id FROM gebruikers WHERE gebruikersnaam = '$gebruikersnaam' AND emailadres = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['reset_gebruikersnaam'] = $gebruikersnaam;
        $_SESSION['reset_email'] = $email;
        header("Location: wachtwoord_reset.php");
    } else {
        $_SESSION['error'] = "Gebruikersnaam en e-mailadres komen niet overeen.";
        header("Location: wachtwoord_vergeten.php");
    }
    exit();
}
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
    
    <h1 style="margin: 0; font-size: 24px;">Wachtwoord Vergeten</h1>
    </header>

<div class="w3-container w3-display-middle" style="max-width: 400px;">
    <div class="w3-card-4 w3-white">
        <div class="w3-container" style="background-color: #2e4a4e; color: white;">
            <h3>Reset je wachtwoord</h3>
        </div>

        <form class="w3-container w3-padding" method="post" action="send_password1.php">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="w3-panel w3-red w3-round w3-padding">
                    <?= htmlspecialchars($_SESSION['error']) ?>
                    <?php unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <label><b>Gebruikersnaam</b></label>
            <input class="w3-input w3-border w3-round" type="text" name="gebruikersnaam" required>

            <label><b>E-mailadres</b></label>
            <input class="w3-input w3-border w3-round" type="email" name="email" required>

            <input class="w3-button w3-block w3-margin-top w3-round" type="submit" value="Wachtwoord resetten"
                   style="background-color: #00ff9d; color: #2e4a4e;">
        </form>
    </div>
</div>

<footer class="w3-bar w3-bottom w3-center w3-padding-16" style="background-color: #2e4a4e; color: white;">
    <p>© 2025 Hypermobility Central</p>
</footer>

<script src="script_nieuweWachtwoord.js"></script>
</body>
</html>