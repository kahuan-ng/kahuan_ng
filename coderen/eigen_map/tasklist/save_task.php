<?php
include "../connect2db.inc";

$title = mysqli_real_escape_string($conn, $_POST['frmTitle']);
$description = mysqli_real_escape_string($conn, $_POST['frmDescription']);

$save_query = "INSERT INTO tasklist (title, date, description)
                VALUES ('$title', NOW(), '$description')";

$result = mysqli_query($conn, $save_query) or die("Fout in SQL.");
header("location: tasklist.php");
exit();
?>