<?php
	include_once "../connect2db.inc";
	$voornaam=$_POST["frmVoornaam"];
	$naam=$_POST["frmNaam"];
    $straat=$_POST["frmStraat"];
    $postcode=$_POST["frmPostcode"];
    $gemeente=$_POST["frmGemeente"];
    $email=$_POST["frmEmail"];
    $telefoon=$_POST["frmTelefoon"];
	$query="INSERT INTO klanten (naam, voornaam, straat, postcode, gemeente, email, telefoon) values ('$naam', '$voornaam', '$straat', '$postcode', '$gemeente', '$email', '$telefoon');";
	$result=mysqli_query($conn,$query) or die("fout in sql!");
	header("Location: index.php");
?>