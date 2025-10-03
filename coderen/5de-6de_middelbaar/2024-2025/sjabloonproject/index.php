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
</head>

<body>
    <?php include_once "header_login.inc"; ?>

    <div class="w3-container">
        <div class="w3-card-4 w3-display-middle" style="max-width: 400px;">
            <div class="w3-container w3-padding w3-teal">
                <h2><?php echo $lang["Login"]; ?></h2>
            </div>

            <!-- Correct Formulier -->
            <form class="w3-container w3-padding" method="post" action="login.php">
                <label for="gebruikersnaam"><?php echo $lang["Username"]; ?></label>
                <input class="w3-input" type="text" name="gebruikersnaam" id="gebruikersnaam">

                <label for="wachtwoord"><?php echo $lang["Password"]; ?></label>
                <input class="w3-input" type="password" name="wachtwoord" id="wachtwoord">

                <!-- Weergave van eventuele foutmeldingen -->
                <?php if (!empty($_SESSION["login_info"])): ?>
                    <div class="w3-panel w3-red w3-padding">
                        <?php echo $_SESSION["login_info"]; ?>
                    </div>
                    <?php unset($_SESSION["login_info"]); // Meldingen wissen na weergave ?>
                <?php endif; ?>

                <div class="w3-padding-32">
                    <input class="w3-button w3-left w3-gray" type="button" value="<?php echo $lang["Register"]; ?>" onclick="window.location.href='registreren.php'">
                    <input class="w3-button w3-right w3-teal" type="submit" value="<?php echo $lang["Login"]; ?>">
                </div>
            </form>
        </div>
    </div>

    <?php include_once "footer_login.inc"; ?>
    <script src="script_login.js"></script>
</body>
</html>
