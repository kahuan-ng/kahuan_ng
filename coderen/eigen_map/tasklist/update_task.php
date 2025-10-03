<?php
    include "../connect2db.inc";

    $id = $_POST['frmID'];
    $title = mysqli_real_escape_string($conn, $_POST["frmTitle"]);
    $description = mysqli_real_escape_string($conn, $_POST['frmDescription']);
    
    $update_query = "UPDATE tasklist SET title = '$title', date = NOW(), description = '$description' WHERE id = '$id'";
    $result = mysqli_query($conn, $update_query) or die("Fout in SQL!");

    header('location: tasklist.php');
    exit();
?>