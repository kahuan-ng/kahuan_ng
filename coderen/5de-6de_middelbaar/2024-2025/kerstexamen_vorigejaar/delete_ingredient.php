<?php
	include_once "../connect2db.inc";
	$ingredientNaam = mysqli_real_escape_string($conn, $_GET["ingredientNaam"]);
	$receptID=$_GET["receptID"];
	$query="DELETE FROM Ingredient WHERE naam ='$ingredientNaam' AND receptID = $receptID;";
	$result=mysqli_query($conn,$query) or die("fout in sql!");
    header("Location: edit.php?id=$receptID");
?>