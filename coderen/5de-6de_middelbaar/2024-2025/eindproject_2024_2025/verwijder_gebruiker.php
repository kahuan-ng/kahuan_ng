<?php
session_start();
include "../connect2db.inc";

if (isset($_POST['frmID'])) {
    $id = intval($_POST['frmID']);

    // Haal gebruikersnaam op
    $query_gebruiker = "SELECT gebruikersnaam FROM gebruikers WHERE id = $id";
    $result_gebruiker = mysqli_query($conn, $query_gebruiker);

    if ($result_gebruiker && mysqli_num_rows($result_gebruiker) > 0) {
        $row = mysqli_fetch_assoc($result_gebruiker);
        $gebruikersnaam = mysqli_real_escape_string($conn, $row['gebruikersnaam']);

        // 1. Verwijder reacties van deze gebruiker op andere verhalen
        $sql_del_reacties_user = "DELETE FROM verhalen_comment WHERE naam_comment = '$gebruikersnaam'";
        mysqli_query($conn, $sql_del_reacties_user);

        // 2. Haal alle verhalen van deze gebruiker op
        $sql_verhaal_ids = "SELECT id FROM verhalen WHERE naam_verhaal = '$gebruikersnaam'";
        $result_verhalen = mysqli_query($conn, $sql_verhaal_ids);

        if ($result_verhalen && mysqli_num_rows($result_verhalen) > 0) {
            while ($verhaal = mysqli_fetch_assoc($result_verhalen)) {
                $verhaal_id = (int)$verhaal['id'];

                // Verwijder reacties op deze verhalen
                $sql_del_reacties_op_verhaal = "DELETE FROM verhalen_comment WHERE id_verhaal = $verhaal_id";
                mysqli_query($conn, $sql_del_reacties_op_verhaal);
            }
        }

        // 3. Verwijder de verhalen zelf
        $sql_del_verhalen = "DELETE FROM verhalen WHERE naam_verhaal = '$gebruikersnaam'";
        mysqli_query($conn, $sql_del_verhalen);

        // 4. Verwijder de gebruiker
        $sql_del_user = "DELETE FROM gebruikers WHERE id = $id";
        $verwijderd = mysqli_query($conn, $sql_del_user);

        // 5. Als gebruiker zichzelf verwijderd: sessie stoppen
        if ($verwijderd) {
            if (isset($_SESSION['gebruiker_id']) && $_SESSION['gebruiker_id'] === $id) {
                $_SESSION = array();
                session_destroy();
                header("Location: aanmelden.php");
                exit;
            } else {
                header("Location: admin.php?status=verwijderd");
                exit;
            }
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
