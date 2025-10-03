<?php
include_once "../connect2db.inc";

if (isset($_POST["frmID"])) {
    $id = intval($_POST["frmID"]); // Veilig maken

    $query = "DELETE FROM hypermobiliteit_variaties WHERE id = $id;";
    mysqli_query($conn, $query);

    header("Location: variatie_controleren.php");
    exit;
} else {
    header("Location: variatie_controleren.php?error=geen_id");
    exit;
}
?>
