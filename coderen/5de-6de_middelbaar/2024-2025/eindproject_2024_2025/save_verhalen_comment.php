<?php
session_start();
include_once "../connect2db.inc"; // database connectie

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ophalen en filteren van input
    $id_verhaal = isset($_POST['verhaal_id']) ? (int)$_POST['verhaal_id'] : 0;
    $naam_comment = isset($_POST['naam']) ? trim($_POST['naam']) : '';
    $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

    // Gebruikers-ID uit sessie ophalen, als je die hebt
    $id_gebruiker = isset($_SESSION['id_gebruiker']) ? (int)$_SESSION['id_gebruiker'] : null;

    // Validatie
    if ($id_verhaal > 0 && !empty($naam_comment) && !empty($comment)) {
        $naam_comment_esc = mysqli_real_escape_string($conn, $naam_comment);
        $comment_esc = mysqli_real_escape_string($conn, $comment);
        $datum_comment = date('Y-m-d H:i:s');

        // Build insert query
        if ($id_gebruiker !== null) {
            $sql = "INSERT INTO verhalen_comment (id_verhaal, naam_comment, comment, datum_comment, id_gebruiker) 
                    VALUES ($id_verhaal, '$naam_comment_esc', '$comment_esc', '$datum_comment', $id_gebruiker)";
        } else {
            $sql = "INSERT INTO verhalen_comment (id_verhaal, naam_comment, comment, datum_comment) 
                    VALUES ($id_verhaal, '$naam_comment_esc', '$comment_esc', '$datum_comment')";
        }

        if (mysqli_query($conn, $sql)) {
            header("Location: delen_verhalen.php");
            exit;
        } else {
            echo "Fout bij opslaan reactie: " . mysqli_error($conn);
        }
    } else {
        echo "Vul alle velden correct in.";
    }
} else {
    echo "Ongeldige aanvraag.";
}
?>
