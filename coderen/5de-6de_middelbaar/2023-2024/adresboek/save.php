<?php include_once "../../connect2db.inc"; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <?php
		$naam=$_POST["frmNaam"];
		$voornaam=$_POST["frmVoornaam"];
        $straat=$_POST["frmStraat"];
        $huisnr=$_POST["frmHuisnr"];
        $postcode=$_POST["frmPostcode"];
        $gemeente=$_POST["frmGemeente"];
        $gsm=$_POST["frmGsm"];
        $email=$_POST["frmEmail"];
        $GBdatum=$_POST["frmGBdatum"];
		$query="INSERT INTO adresboek (naam, voornaam, geboortedatum, straat, huisnummer, postcode, gemeente, telefoon, emailadres) values ('$naam', '$voornaam', '$GBdatum', '$straat', '$huisnr', '$postcode', '$gemeente', '$gsm', '$email');";
		$result=mysqli_query($conn,$query) or die("fout in sql!");
	?>
	De gegevens werden bewaard.<br />
	<a href="index.php">Ga terug naar het adresboek.</a>
</body>
</html>