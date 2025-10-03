<?php
session_start();
ob_start();
include "../connect2db.inc";

$naam = $_POST["frmNaam"];
$voornaam = $_POST["frmVoornaam"];
$emailadres = $_POST["frmEmailadres"];
$gebruikersnaam = $_POST["frmGebruikersnaam"];
$wachtwoord = $_POST["frmWachtwoord"];
$rechten = "gebruiker";

$gehashtWachtwoord = password_hash($wachtwoord, PASSWORD_BCRYPT);

$query = "INSERT INTO gebruikers (naam, voornaam, emailadres, gebruikersnaam, wachtwoord, rechten) 
          VALUES ('$naam', '$voornaam', '$emailadres', '$gebruikersnaam', '$gehashtWachtwoord', '$rechten');";
          
$result = mysqli_query($conn, $query) or die("Fout in SQL!");
header("Location: aanmelden.php");
exit(); 
ob_end_flush();
?>
