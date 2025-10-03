<?php
session_start();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Inloggen</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="aanmelden.css" type="text/css">

</head>

<body style="background-color: #e0f2f1; color: #263238;">

    <!-- Header -->
   <header class="w3-bar w3-padding-16" style="background-color: #2e4a4e; color: white; display: flex; align-items: center; justify-content: center; position: relative;">
    
        <a href="index.php" style="position: absolute; left: 16px; display: flex; align-items: center;">
            <img src="hypermobility_logo.png" alt="Hypermobility Central Logo" style="height: 50px; margin-bottom: 2px;">
        </a>
    
        <h1 style="margin: 0; font-size: 24px;">Login</h1>
    
    </header>

    <!-- Login Kaart -->
    <div class="w3-container">
        <div class="w3-card-4 w3-white w3-margin w3-display-middle" style="max-width: 400px;">
            <div class="w3-container" style="background-color: #2e4a4e; color: white;">
                <h2>Login</h2>
            </div>

            <!-- Formulier -->
            <form class="w3-container w3-padding" method="post" action="login.php">
                <label for="gebruikersnaam"><b>Gebruikersnaam</b></label>
                <input class="w3-input w3-border w3-round" type="text" name="gebruikersnaam" id="gebruikersnaam" style="background-color: #e0f2f1;" required>

                <label for="wachtwoord"><b>Wachtwoord</b></label>
                <input class="w3-input w3-border w3-round" type="password" name="wachtwoord" id="wachtwoord" style="background-color: #e0f2f1;" required>

                <!-- Foutmelding -->
                <?php if (!empty($_SESSION["login_info"])): ?>
                    <div class="w3-panel w3-padding w3-round w3-margin-top" style="background-color: red; color: #263238;">
                        <strong><?php echo $_SESSION["login_info"]; ?></strong>
                    </div>
                    <?php unset($_SESSION["login_info"]); ?>
                <?php endif; ?>

                <div class="w3-padding w3-center">
                    <input class="w3-button w3-round w3-margin-top" type="button" value="Registreren"
                           onclick="window.location.href='registreren.php'"
                           style="background-color: #00ff9d; color: #2e4a4e;">
                    
                    <input class="w3-button w3-round w3-margin-top" type="submit" value="Aanmelden"
                           style="background-color: #73d9e7; color: #2e4a4e;">
                           
                    <div class="w3-padding w3-center">
                        <a href="wachtwoord_vergeten.php" style="color: #2e4a4e;">Wachtwoord vergeten?</a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w3-bar w3-bottom w3-center w3-padding-16" style="background-color: #2e4a4e; color: white;">
        <p>© 2025 Hypermobility Central</p>
    </footer>

    <script src="script_login.js"></script>
</body>
</html>
