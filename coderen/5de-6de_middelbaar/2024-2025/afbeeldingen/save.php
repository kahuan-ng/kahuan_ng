<?php
	include_once("../connect2db.inc");
	
	$naam = $_POST["naam"];
	$beschrijving = $_POST["beschrijving"];
	
	$afb_container = $_FILES['afbeelding']['tmp_name'];
	$afbeelding = addslashes(file_get_contents($afb_container));
	
	$query="INSERT into afbeelding (naam, afbeelding, beschrijving) VALUES ('$naam', '$afbeelding', '$beschrijving')";
	
	$afbeelding = mysqli_query($conn,$query) or die ("Fout in $query");
	
	header("Location: index.php");
?>