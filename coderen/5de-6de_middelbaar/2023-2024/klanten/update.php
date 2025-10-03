<?php
	include_once "connect2db.inc";
	$id=$_POST["frmID"];
	$voornaam=$_POST["frmVoornaam"];
	$naam=$_POST["frmNaam"];
    $straat=$_POST["frmStraat"];
    $postcode=$_POST["frmPostcode"];
    $gemeente=$_POST["frmGemeente"];
    $email=$_POST["frmEmail"];
    $telefoon=$_POST["frmTelefoon"];

	$query="update klanten set naam='$naam', voornaam='$voornaam', straat='$straat', postcode='$postcode', gemeente='$gemeente', email='$email', telefoon='$telefoon' where id = $id;";

	$result=mysqli_query($conn,$query) or die("fout in sql!");
	header("Location: index.php");
?>