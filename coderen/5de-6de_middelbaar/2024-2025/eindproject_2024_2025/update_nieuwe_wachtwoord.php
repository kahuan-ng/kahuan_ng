<?php
session_start();

$token = $_POST['token'] ?? '';
$w1 = $_POST['frmNieuweWachtwoord'] ?? '';
$w2 = $_POST['frmControleWachtwoord'] ?? '';

if (!$token || !$w1 || !$w2) {
    $_SESSION['error'] = "Vul alle velden in.";
    header("Location: wachtwoord_reset.php?token=" . urlencode($token));
    exit;
}

if ($w1 !== $w2) {
    $_SESSION['error'] = "Wachtwoorden komen niet overeen.";
    header("Location: wachtwoord_reset.php?token=" . urlencode($token));
    exit;
}

require __DIR__ . "/../connect2db.inc";  // deze defineert $conn

$token_hash = hash("sha256", $token);

$sql = "SELECT id FROM gebruikers WHERE reset_token = ? AND reset_token_expires_at > NOW()";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    die("Fout in SQL voorbereiding: " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, "s", $token_hash);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 0) {
    $_SESSION['error'] = "Ongeldige of verlopen token.";
    header("Location: wachtwoord_vergeten.php");
    exit;
}

$user = mysqli_fetch_assoc($result);
$userId = $user['id'];

$hash = password_hash($w1, PASSWORD_DEFAULT);

$sqlUpdate = "UPDATE gebruikers SET wachtwoord = ?, reset_token = NULL, reset_token_expires_at = NULL WHERE id = ?";
$stmtUpdate = mysqli_prepare($conn, $sqlUpdate);
if (!$stmtUpdate) {
    die("Fout in SQL voorbereiding update: " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmtUpdate, "si", $hash, $userId);
mysqli_stmt_execute($stmtUpdate);

if (mysqli_stmt_affected_rows($stmtUpdate) > 0) {
    $_SESSION['success_message'] = "Wachtwoord succesvol gewijzigd.";
    header("Location: login.php");
} else {
    $_SESSION['error'] = "Fout bij wijzigen wachtwoord.";
    header("Location: wachtwoord_reset.php?token=" . urlencode($token));
}
exit;
?>