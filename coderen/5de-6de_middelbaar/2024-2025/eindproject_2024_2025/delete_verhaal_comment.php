<?php
session_start();
include_once "../connect2db.inc";

if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location: aanmelden.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_comment'])) {
    $comment_id = (int)$_POST['id_comment'];

    // Verwijder de reactie
    $sql_delete = "DELETE FROM verhalen_comment WHERE id_comment = $comment_id";
    mysqli_query($conn, $sql_delete);

    header("Location: delen_verhalen.php");
    exit();
} else {
    header("Location: delen_verhalen.php");
    exit();
}
?>
