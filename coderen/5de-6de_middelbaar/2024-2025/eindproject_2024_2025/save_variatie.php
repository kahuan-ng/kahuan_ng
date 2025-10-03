<?php
session_start();
ob_start();
include "../connect2db.inc";

$naam_variatie = $_POST["naam_variatie"];
$beschrijving_variatie = $_POST["beschrijving_variatie"];

$query = "INSERT INTO hypermobiliteit_variaties (naam_variatie, beschrijving_variatie) 
          VALUES ('$naam_variatie', '$beschrijving_variatie');";
          
$result = mysqli_query($conn, $query) or die("Fout in SQL!");
header("Location: variaties.php");
exit();
ob_end_flush();
?>
