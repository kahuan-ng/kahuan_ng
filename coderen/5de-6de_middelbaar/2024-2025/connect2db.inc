<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "csue76y0j_kahuanng";

  $conn = mysqli_connect($host, $user, $password)
    or die("Kan niet verbinden met server.");
  $db = mysqli_select_db($conn, $database)
    or die("Kan niet verbinden met database.");

  date_default_timezone_set("Europe/Brussels");
  mysqli_set_charset($conn, "utf8");
?>