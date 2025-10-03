<?php
	include_once "../connect2db.inc";
	$id=$_POST["frmID"];
	$naam=$_POST["frmNaam"];
	$aantalPersonen=$_POST["frmAantalPersonen"];
    $bereidingswijze=$_POST["frmBereidingswijze"];
	$query="update Recept set naam='$naam', aantal_personen='$aantalPersonen', bereidingswijze='$bereidingswijze' where id= $id;";
	$result=mysqli_query($conn,$query) or die("fout in sql!");
	header("Location: index.php");
?>