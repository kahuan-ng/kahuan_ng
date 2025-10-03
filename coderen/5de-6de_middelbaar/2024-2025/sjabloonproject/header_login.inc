<?php
// Controleer of de verbinding via HTTP gaat en doe de redirect naar HTTPS
if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
    $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: " . $url);
    exit();
}

// Start de sessie
session_start();

// Controleer of de taal in de sessie is ingesteld, anders stel Engels in als default
if (!isset($_SESSION['taal'])) {
    $_SESSION['taal'] = 'EN'; // Standaard Engels
}

// Zet pad naar de map waarin je taalbestanden staan
$taal_map = "taal/"; // AANPASSEN als jouw .inc-bestanden ergens anders staan

// Beveilig tegen rare invoer
$taal = basename($_SESSION['taal']); // Enkel bestandsnaam, geen pad mogelijk

// Bepaal het volledige pad naar het taalbestand
$taal_bestand_pad = $taal_map . $taal . ".inc";

// Controleer of het taalbestand bestaat en laad het, anders laad je Engels als fallback
if (file_exists($taal_bestand_pad)) {
    include($taal_bestand_pad);  // Bijvoorbeeld taal/NL.inc of taal/EN.inc
} else {
    include($taal_map . "EN.inc");  // Fallback naar Engels
}
?>

<header class="w3-bar w3-large w3-top w3-teal w3-center w3-display-container">
    <span class="w3-bar-item w3-center w3-display-middle"><?php echo $lang["Title"]; ?></span>

    <div class="w3-container w3-padding">
        <a href="logout.php" class="w3-btn w3-gray w3-right"><?php echo $lang["Logout"]; ?></a>

        <?php
            // Controleer of de gebruiker is ingelogd
            if (isset($_SESSION['gebruiker_id']) && isset($_SESSION['gebruiker'])) {
                $gebruiker_naam = htmlspecialchars($_SESSION['gebruiker']);
                echo '<a href="edit_registratie.php?id=' . $_SESSION["gebruiker_id"] . '" class="w3-btn w3-right w3-light-gray">' . $gebruiker_naam . '</a>';
            }
        ?>
    </div>
</header>
