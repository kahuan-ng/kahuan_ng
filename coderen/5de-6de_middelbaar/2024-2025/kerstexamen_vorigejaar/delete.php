<?php
	include_once "../connect2db.inc";
	$id=$_GET["id"];
	$query1="delete from Recept where id = $id;";
	$result1=mysqli_query($conn,$query1) or die("fout in sql!");
	$query2="delete from Ingredient where Receptid = $id;";
	$result2=mysqli_query($conn,$query2) or die("fout in sql!");
	header("Location: index.php?id=$id");
?>