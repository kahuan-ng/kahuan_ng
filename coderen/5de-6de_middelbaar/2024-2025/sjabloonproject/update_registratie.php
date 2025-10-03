<?php
session_start();
include_once "../connect2db.inc";

// Verkrijg de gegevens uit het formulier
$id = $_POST["frmID"];
$naam = $_POST["frmNaam"];
$voornaam = $_POST["frmVoornaam"];
$emailadres = $_POST["frmEmailadres"];
$gebruikersnaam = $_POST["frmGebruikersnaam"];
$wachtwoord = $_POST["frmWachtwoord"];
$taal = $_POST["frmTaal"];

// Start query
$query = "UPDATE login_systeem SET 
    naam='$naam', 
    voornaam='$voornaam', 
    emailadres='$emailadres', 
    gebruikersnaam='$gebruikersnaam', 
    taal='$taal'";

// Als het wachtwoord niet leeg is, voeg dan update voor wachtwoord toe
if (!empty($wachtwoord)) {
    $hashedWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
    $query .= ", wachtwoord='$hashedWachtwoord'";
}

// Voeg WHERE toe
$query .= " WHERE id = $id;";

// Voer de query uit
$result = mysqli_query($conn, $query) or die("Fout in SQL!");

// Bevestigingsbericht
echo "De gegevens werden gewijzigd<br>";
?>
<a href="index.php">Ga terug naar het adresboek.</a>
