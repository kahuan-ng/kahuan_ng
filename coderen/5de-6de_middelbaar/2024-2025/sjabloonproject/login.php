<?php
session_start();

// Verbinding met database
$conn = new mysqli("localhost", "csue76y0j_kahuanng", "Y4KAc4XU1!", "csue76y0j_kahuanng");
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

if (!empty($_POST["gebruikersnaam"]) && !empty($_POST["wachtwoord"])) {
    $gebruikersnaam = $_POST["gebruikersnaam"];
    $wachtwoord = $_POST["wachtwoord"];

    $sql = "SELECT * FROM login_systeem WHERE gebruikersnaam = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $gebruikersnaam);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($gebruiker = $result->fetch_assoc()) {
        if (password_verify($wachtwoord, $gebruiker["wachtwoord"])) {
            $_SESSION["login_info"] = "Inloggen gelukt!";
            $_SESSION["ingelogd"] = true;
            $_SESSION["gebruiker_id"] = $gebruiker["id"];
            $_SESSION["gebruiker"] = $gebruiker["voornaam"] . " " . $gebruiker["naam"];
            $_SESSION["rechten"] = $gebruiker["rechten"];
            $_SESSION["taal"] = strtoupper($gebruiker["taal"]); // Taal opslaan in sessie

            header("Location: index.php");
            exit();
        }
    }

    session_unset();
    $_SESSION["login_info"] = "Gebruikersnaam of wachtwoord foutief!";
    header("Location: index.php");
    exit();
} else {
    $_SESSION["login_info"] = "Vul alle velden in!";
    header("Location: index.php");
    exit();
}
?>
