<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
		include('connect2db.inc');
		$naam=$_POST["frmNaam"];
		$voornaam=$_POST["frmVoornaam"];
        $geboortedatum=$_POST["frmGeboorteDatum"];
    	$straat=$_POST["frmStraat"];
        $huisnummer=$_POST["frmHuisnummer"];
        $postcode=$_POST["frmPostcode"];
        $gemeente=$_POST["frmGemeente"];
        $telefoon=$_POST["frmTelefoon"];
        $emailadres=$_POST["frmEmail"];




        
    
		$query="insert into adresboek (naam, voornaam, geboortedatum, straat, huisnummer, postcode, gemeente, telefoon, emailadres ) values ('$naam', '$voornaam', '$geboortedatum', '$straat', '$huisnummer', '$postcode', '$gemeente', '$telefoon', '$emailadres');";
		$result=mysqli_query($conn,$query) or die("fout in sql!");
	?>
	De gegevens werden bewaard.<br />
	<a href="index.php">Ga terug naar het adresboek.</a>
</body>
</html>