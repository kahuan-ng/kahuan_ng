<?php
	include_once "connect2db.inc";
	$id=$_GET["id"];
	$query="delete from klanten where id = $id;";

	$result=mysqli_query($conn,$query) or die("fout in sql!");
	header("Location: index.php");
?>