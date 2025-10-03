<?php
session_start();
include_once "../connect2db.inc";

// 1. gegevens ophalen uit POST
$id = $_POST['frmID'];
$voornaam = $_POST['frmVoornaam'];
$naam = $_POST['frmNaam'];
$email = $_POST['frmEmailadres'];
$gebruikersnaam = $_POST['frmGebruikersnaam'];

// wachtwoord optioneel: alleen updaten als veld niet leeg is
if (!empty($_POST['frmWachtwoord'])) {
    $nieuwWachtwoord = password_hash($_POST['frmWachtwoord'], PASSWORD_DEFAULT);
    $sql = "UPDATE gebruikers SET voornaam=?, naam=?, emailadres=?, gebruikersnaam=?, wachtwoord=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $voornaam, $naam, $email, $gebruikersnaam, $nieuwWachtwoord, $id);
} else {
    $sql = "UPDATE gebruikers SET voornaam=?, naam=?, emailadres=?, gebruikersnaam=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $voornaam, $naam, $email, $gebruikersnaam, $id);
}

// 2. update uitvoeren
if ($stmt->execute()) {
    // 3. sessie updaten met nieuwe waarden
    $_SESSION["gebruiker"] = $voornaam . " " . $naam;
    $_SESSION["gebruikersnaam"] = $gebruikersnaam;
    // (indien nodig ook andere sessievariabelen updaten)

    // 4. redirecten naar homepagina
    header("Location: index.php");
    exit();
} else {
    // foutmelding bij update
    echo "Er is iets misgegaan bij het updaten.";
}
?>
