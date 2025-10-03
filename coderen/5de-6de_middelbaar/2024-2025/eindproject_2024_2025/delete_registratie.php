<?php
session_start();
include "../connect2db.inc";

if (isset($_POST['frmID'])) {
    $id = intval($_POST['frmID']);

    // Haal gebruikersnaam op om verhalen/reacties te kunnen vinden
    $query_gebruiker = "SELECT gebruikersnaam FROM gebruikers WHERE id = $id";
    $result_gebruiker = mysqli_query($conn, $query_gebruiker);

    if ($result_gebruiker && mysqli_num_rows($result_gebruiker) > 0) {
        $row = mysqli_fetch_assoc($result_gebruiker);
        $gebruikersnaam = mysqli_real_escape_string($conn, $row['gebruikersnaam']);

        // Stap 1: Verwijder reacties van gebruiker
        $sql_comments = "DELETE FROM verhalen_comment WHERE naam_comment = '$gebruikersnaam'";
        mysqli_query($conn, $sql_comments);

        // Stap 2: Haal alle verhaal-IDs op van gebruiker
        $sql_verhaal_ids = "SELECT id FROM verhalen WHERE naam_verhaal = '$gebruikersnaam'";
        $result_verhaal_ids = mysqli_query($conn, $sql_verhaal_ids);

        // Verwijder reacties per verhaal (extra zekerheid, mocht naam_comment niet voldoende zijn)
        if ($result_verhaal_ids && mysqli_num_rows($result_verhaal_ids) > 0) {
            while ($verhaal = mysqli_fetch_assoc($result_verhaal_ids)) {
                $verhaal_id = (int)$verhaal['id'];
                $sql_del_verhaal_reacties = "DELETE FROM verhalen_comment WHERE id_verhaal = $verhaal_id";
                mysqli_query($conn, $sql_del_verhaal_reacties);
            }
        }

        // Stap 3: Verwijder verhalen zelf
        $sql_verhalen = "DELETE FROM verhalen WHERE naam_verhaal = '$gebruikersnaam'";
        mysqli_query($conn, $sql_verhalen);

        // Stap 4: Verwijder gebruiker
        $sql_delete_user = "DELETE FROM gebruikers WHERE id = $id";
        $result_delete = mysqli_query($conn, $sql_delete_user);

        if ($result_delete) {
            // Als de verwijderde gebruiker dezelfde is als de ingelogde gebruiker
            if (isset($_SESSION['gebruiker_id']) && $_SESSION['gebruiker_id'] === $id) {
                $_SESSION = array();
                session_destroy();
            }

            header("Location: aanmelden.php");
            exit();
        } else {
            echo "Fout bij verwijderen van gebruiker.";
        }
    } else {
        echo "Gebruiker niet gevonden.";
    }
} else {
    echo "Geen geldige gebruikers-ID opgegeven.";
}
?>
