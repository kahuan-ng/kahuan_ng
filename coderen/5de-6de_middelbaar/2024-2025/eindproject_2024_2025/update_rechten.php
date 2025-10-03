<?php
session_start();
include_once "../connect2db.inc";

$id = $_POST['id'];
$nieuwe_rechten = $_POST['nieuwe_rechten'];

// Alleen admin of gebruiker toegestaan
if (is_numeric($id) && in_array($nieuwe_rechten, ['admin', 'gebruiker'])) {
    $stmt = $conn->prepare("UPDATE gebruikers SET rechten = ? WHERE id = ?");
    $stmt->bind_param("si", $nieuwe_rechten, $id);
    $stmt->execute();
}

header("Location: admin.php");
exit;