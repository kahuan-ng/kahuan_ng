<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "csue76y0j_kahuanng";

// Verbind met de database, inclusief de database zelf
$conn = mysqli_connect($host, $user, $password, $database)
    or die("Kan niet verbinden met database: " . mysqli_connect_error());

date_default_timezone_set("Europe/Brussels");
mysqli_set_charset($conn, "utf8");
?>