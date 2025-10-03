<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php 
    include_once "../../connect2db.inc";
		$id=$_POST["frmID"];
		$naam=$_POST["frmNaam"];
		$voornaam=$_POST["frmVoornaam"];
        $straat=$_POST["frmStraat"];
        $huisnr=$_POST["frmHuisnr"];
        $postcode=$_POST["frmPostcode"];
        $gemeente=$_POST["frmGemeente"];
        $gsm=$_POST["frmGsm"];
        $email=$_POST["frmEmail"];
        $GBdatum=$_POST["frmGBdatum"];
		$query="update adresboek set naam='$naam', voornaam='$voornaam', straat='$straat', huisnummer='$huisnr', postcode='$postcode', gemeente='$gemeente', telefoon='$gsm', emailadres='$email', geboortedatum='$GBdatum' where id = $id;";
		$result=mysqli_query($conn,$query) or die("fout in sql!");
	?>
	<div class="w3-padding">
        <p>gegevens werden gewijzigd</p>
	    <a href="index.php" class="w3-red w3-round-large" style="padding: 15px;">Ga terug naar het adresboek.</a>
    </div>