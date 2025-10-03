<?php
session_start();

// Verbind met database via connect2db.inc
include_once("../connect2db.inc"); // pas pad aan naar juiste locatie

if (!empty($_POST["gebruikersnaam"]) && !empty($_POST["wachtwoord"])) {
    $gebruikersnaam = $_POST["gebruikersnaam"];
    $wachtwoord = $_POST["wachtwoord"];

    $sql = "SELECT * FROM gebruikers WHERE gebruikersnaam = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $gebruikersnaam);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($gebruiker = $result->fetch_assoc()) {
        if (password_verify($wachtwoord, $gebruiker["wachtwoord"])) {
            $_SESSION["login_info"] = "Inloggen gelukt!";
            $_SESSION["ingelogd"] = true;
            $_SESSION["gebruiker_id"] = $gebruiker["id"];
            $_SESSION["id_gebruiker"] = $gebruiker["id"];
            $_SESSION["gebruiker"] = $gebruiker["voornaam"] . " " . $gebruiker["naam"];
            $_SESSION["gebruikersnaam"] = $gebruiker["gebruikersnaam"];
            $_SESSION["rechten"] = $gebruiker["rechten"];
            $_SESSION["user_identifier"] = $gebruiker["id"];

            header("Location: index.php");
            exit();
        }
    }

    // Mislukt: sessie leegmaken, foutmelding geven
    session_unset();
    $_SESSION["login_info"] = "Gebruikersnaam of wachtwoord foutief!";
    header("Location: aanmelden.php");
    exit();
} else {
    $_SESSION["login_info"] = "Vul alle velden in!";
    header("Location: aanmelden.php");
    exit();
}
?>
