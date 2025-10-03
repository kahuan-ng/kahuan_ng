<?php
session_start();
include "../connect2db.inc";

// Controleer of gebruiker is ingelogd
if (!isset($_SESSION['gebruiker_id']) || !isset($_SESSION['gebruikersnaam'])) {
    $_SESSION["bericht_info"] = "Je moet ingelogd zijn om een verhaal in te dienen.";
    $_SESSION["bericht_success"] = false;
    header("Location: delen_verhalen.php");
    exit();
}

// Gegevens ophalen uit sessie
$id_gebruiker = $_SESSION['gebruiker_id'];
$naam = $_SESSION['gebruikersnaam'];
$email = isset($_SESSION['email']) ? $_SESSION['email'] : "";

// Bescherm tegen SQL-injectie
$onderwerp = mysqli_real_escape_string($conn, $_POST["frmOnderwerp_verhaal"]);
$verhaal = mysqli_real_escape_string($conn, $_POST["frmVerhaal"]);

// Query uitvoeren
$query = "INSERT INTO verhalen (id_gebruiker, naam_verhaal, email, onderwerp, verhaal, datum)
          VALUES ('$id_gebruiker', '$naam', '$email', '$onderwerp', '$verhaal', NOW())";

if (mysqli_query($conn, $query)) {
    $_SESSION["bericht_info"] = "Je verhaal is succesvol opgeslagen. Bedankt!";
    $_SESSION["bericht_success"] = true;
} else {
    $_SESSION["bericht_info"] = "Er is een fout opgetreden bij het opslaan van je verhaal.";
    $_SESSION["bericht_success"] = false;
}

header("Location: delen_verhalen.php");
exit();
?>