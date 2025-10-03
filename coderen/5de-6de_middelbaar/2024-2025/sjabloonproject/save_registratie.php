<?php
// Start de sessie
session_start();

// Start output buffering om ongewenste output te voorkomen
ob_start();

include "../connect2db.inc"; // Verbind met de database

// Verkrijg de formuliergegevens
$naam = $_POST["frmNaam"];
$voornaam = $_POST["frmVoornaam"];
$emailadres = $_POST["frmEmailadres"];
$gebruikersnaam = $_POST["frmGebruikersnaam"];
$wachtwoord = $_POST["frmWachtwoord"];
$taal = $_POST["frmTaal"];
$rechten = "nee"; // Je kunt "admin" of een andere rol instellen als nodig

// Hash het wachtwoord
$gehashtWachtwoord = password_hash($wachtwoord, PASSWORD_BCRYPT);

// Maak de SQL-query om de gebruiker toe te voegen met het gehashte wachtwoord
$query = "INSERT INTO login_systeem (naam, voornaam, emailadres, gebruikersnaam, wachtwoord, taal, rechten) 
          VALUES ('$naam', '$voornaam', '$emailadres', '$gebruikersnaam', '$gehashtWachtwoord', '$taal', '$rechten');";

// Voer de query uit
$result = mysqli_query($conn, $query) or die("Fout in SQL!");

// Sla de taal op in de sessie na registratie
$_SESSION["taal"] = $taal; // Bewaar de geselecteerde taal in de sessie

// Redirect naar de indexpagina na registratie
header("Location: index.php");

// Stop de scriptuitvoering na de header-redirect
exit(); 

// Stop output buffering en verzend de uitvoer
ob_end_flush();
?>
