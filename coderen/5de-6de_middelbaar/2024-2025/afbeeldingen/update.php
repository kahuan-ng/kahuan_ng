<?php
	include_once("../connect2db.inc");
	
	$id = $_POST["id"];
	$naam = $_POST["naam"];
	$beschrijving = $_POST["beschrijving"];
	
	$afb_container = $_FILES['afbeelding']['tmp_name'];
	
	if (!empty($afb_container)) {
		$afbeelding = addslashes(file_get_contents($afb_container));
		$query="UPDATE afbeelding set naam = '$naam', afbeelding = '$afbeelding', beschrijving = '$beschrijving' where id = $id";
	} else {
		$query="UPDATE afbeelding set naam = '$naam', beschrijving = '$beschrijving' where id = $id";
	}
	$afbeelding = mysqli_query($conn,$query) or die ("Fout in $query");
	
	header("Location: index.php");
?>