<?php
    include "../connect2db.inc";

    $id = $_POST['frmID'];
    $onderwerp_dag = $_POST["frmOnderwerp"];
    $verhaal_dag = $_POST['frmVerhaal'];

    $update_query = "UPDATE dag_verhaal SET onderwerp = '$onderwerp_dag', verhaal = '$verhaal_dag' WHERE id = '$id'";
    $result = mysqli_query($conn, $update_query) or die("Fout in SQL!");

    header('location: dagboek.php');
    exit();
?>