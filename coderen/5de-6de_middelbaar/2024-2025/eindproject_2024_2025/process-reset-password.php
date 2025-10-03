<?php

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/../connect2db.inc";

$sql = "SELECT * FROM gebruiker
        WHERE reset_token = ?";
        
        
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}
    echo "token is valid and not expired";
    
$sql = "UPDATE gebruiker SET wachtwoord_hash = ? WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("si", $password_hash, $user["id"]);
$stmt->execute();
    
    echo "Password Updated";
?>

