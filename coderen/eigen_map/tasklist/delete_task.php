<?php
    include_once("../connect2db.inc");

    $id = $_GET["id"];

    $delete_query = "DELETE from tasklist WHERE id = $id";

    $result = mysqli_query($conn, $delete_query) or die("Fout bij DELETE");
    header("Location: tasklist.php");
?>