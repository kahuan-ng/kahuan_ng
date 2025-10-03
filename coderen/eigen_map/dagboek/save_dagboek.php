<?php
include "../connect2db.inc";

$onderwerp_dag = $_POST["frmOnderwerp"];
$verhaal_dag = $_POST["frmVerhaal"];

$save_query = "INSERT INTO dag_verhaal (onderwerp, verhaal, dag)
                VALUES ('$onderwerp_dag', '$verhaal_dag', NOW());";

$result = mysqli_query($conn, $save_query) or die("Fout in SQL.");
header("location: dagboek.php");
exit();
?>