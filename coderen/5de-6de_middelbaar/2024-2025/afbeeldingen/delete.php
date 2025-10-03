<?php
	include_once("../connect2db.inc");
	$id=$_GET["id"];

	$query="delete from afbeelding where id = $id;";
	$result=mysqli_query($conn,$query) or die("fout in \"$query\"");
	
	header("Location: index.php");
?>