<?php
session_start();

// Controleer of de taal in de sessie is ingesteld, anders stel Engels in als default
if (!isset($_SESSION['taal'])) {
    $_SESSION['taal'] = 'EN'; // Standaard Engels
}

// Zet pad naar de map waarin je taalbestanden staan
$taal_map = "taal/";
$taal = basename($_SESSION['taal']); // Beveiliging
$taal_bestand_pad = $taal_map . $taal . ".inc";

if (file_exists($taal_bestand_pad)) {
    include($taal_bestand_pad);
} else {
    include($taal_map . "EN.inc"); // Fallback
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0"?>
    <link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<header class="w3-bar w3-large" style="background-color:#2E4A4F; color:#E7FFF9;">
    <!-- Logo -->
    <a href="index.php">
        <img src="hypermobility_logo.png" alt="Hypermobility Central Logo" class="w3-bar-item logo">
    </a>

    <!-- Dropdown 1: Info -->
    <div class="w3-dropdown-hover">
        <button class="w3-button" style="background-color:#2E4A4F; color:#E7FFF9;">Dropdown 1: Info</button>
        <div class="w3-dropdown-content w3-bar-block w3-border" style="background-color:#3B6064;">
            <a href="infopage.php" class="w3-bar-item w3-button" style="color:#E7FFF9;">Info</a>
        </div>
    </div>

    <!-- Dropdown 2: Variaties en Kenmerken -->
    <div class="w3-dropdown-hover">
        <button class="w3-button" style="background-color:#2E4A4F; color:#E7FFF9;">Dropdown 2: Variaties</button>
        <div class="w3-dropdown-content w3-bar-block w3-border" style="background-color:#3B6064;">
            <a href="variaties.php" class="w3-bar-item w3-button" style="color:#E7FFF9;">Variaties</a>
            <a href="#" class="w3-bar-item w3-button" style="color:#E7FFF9;">Kenmerken</a>
            <a href="beightonscore_test.php" class="w3-bar-item w3-button" style="color:#E7FFF9;">Beightonscore test</a>
        </div>
    </div>
    
    <div class="w3-dropdown-hover">
        <button class="w3-button" style="background-color:#2E4A4F; color:#E7FFF9;">Dropdown 3: Variaties</button>
        <div class="w3-dropdown-content w3-bar-block w3-border" style="background-color:#3B6064;">
            <a href="delen_verhalen.php" class="w3-bar-item w3-button" style="color:#E7FFF9;">Verhalen</a>
        </div>
    </div>

    <!-- Login/Registratie of Gebruiker + Logout -->
    <div class="w3-bar-item w3-right" style="display: flex; align-items: center; gap: 8px;">
        <?php
        if (isset($_SESSION['gebruiker_id']) && isset($_SESSION['gebruiker'])) {
            // ✅ Ingelogd → Toon naam + edit + logout
            $gebruiker_naam = htmlspecialchars($_SESSION['gebruiker']);
            echo '<a href="edit_registratie.php?id=' . $_SESSION["gebruiker_id"] . '" class="w3-button w3-round-xlarge" style="background-color:#00FF88; color:#2E4A4F;">' 
                . $gebruiker_naam . '</a>';
            echo '<a href="logout.php" class="w3-button w3-round-xlarge" style="background-color:#50E4E4; color:#2E4A4F;">'
                . $lang["Logout"] . '</a>';
        } else {
            // ❌ Niet ingelogd → Toon registratie + login
            echo '<a href="registreren.php" class="w3-button w3-round-xlarge" style="background-color:#00FF88; color:#2E4A4F;">Registratie</a>';
            echo '<a href="aanmelden.php" class="w3-button w3-round-xlarge" style="background-color:#50E4E4; color:#2E4A4F;">Login</a>';
        }
        ?>
    </div>
</header>
    
<footer class="w3-container w3-bottom footer" style="background-color:#2E4A4F; color:#E7FFF9;">
    <div class="w3-row">
        <div class="w3-half w3-center w3-padding">
            <h3>Contacteer ons</h3>
            <p>Email: info@hypermobiliteitcenter.be</p>
            <p>Telefoon: +32 123 45 67 89</p>
            <p>Adres: Sportstraat 10, 9000 Gent, België</p>
        </div>
        
        <div class="w3-half w3-bottom w3-center w3-padding">
            <img src="hypermobility_logo.png" alt="Hypermobility Central Logo" class="w3-bar-item logo_f" style="width: 125px; height:125px;">
        </div>
    </div>
</footer>
    <script="script.js"></script>
</body>
</html>

