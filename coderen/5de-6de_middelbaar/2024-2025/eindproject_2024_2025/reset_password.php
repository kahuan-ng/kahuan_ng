<?php

$token = $_GET["token"];

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
    <header class ="w3-bar w3-large w3-top w3-teal">
        <span class ="w3-bar-item">De Header</span>
    </header>
    
<form method="post" action="process-reset-password.php">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
    
    <label for ="password">New Password</label>
    <input type ="password" id="password" name="password">
    
    <label for ="password_confirm">Repeat Password</label>
    <input type ="password_confirm" id="password_confirm" name="password_confirm">
    
    <button>Send</button>>
</form>
    
    <footer class ="w3-bar w3-bottom w3-teal">
        <span class ="w3-bar-item">(c) 2024 by Ka-Huan Ng</span>
    </footer>
    
    <script="script.js"></script>
</body>
</html>