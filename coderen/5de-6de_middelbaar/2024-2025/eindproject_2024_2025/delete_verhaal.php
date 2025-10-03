<?php
session_start();
include_once "../connect2db.inc";

if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location: aanmelden.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verhaal_id'])) {
    $verhaal_id = (int)$_POST['verhaal_id'];

    // Verwijder eerst reacties van dit verhaal
    $sql_comments = "DELETE FROM verhalen_comment WHERE id_verhaal = $verhaal_id";
    mysqli_query($conn, $sql_comments);

    // Verwijder het verhaal zelf
    $sql_verhaal = "DELETE FROM verhalen WHERE id = $verhaal_id";
    mysqli_query($conn, $sql_verhaal);

    header("Location: delen_verhalen.php");
    exit();
} else {
    header("Location: delen_verhalen.php");
    exit();
}
?>