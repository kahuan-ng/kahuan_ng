<?php 
    include "../connect2db.inc";
        $naam=$_POST["frmNaam"];
        $beschrijving=$_POST["frmBeschrijving"];
        $datum=$_POST['frmDatum'];
        $locatie=$_POST['frmLocatie'];
        $doelbedrag=$_POST['frmBedrag'];
        $query="INSERT INTO ww_acties (naam, beschrijving, datum, locatie, doelbedrag) values ('$naam', '$beschrijving', '$datum', '$locatie', '$doelbedrag');";
	$result=mysqli_query($conn,$query) or die("fout in sql!");
    header("Location: acties.php");
?>