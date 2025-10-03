<?php include_once "../../connect2db.inc"; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-bar w3-teal w3-xlarge w3-top">
        <span class="w3-bar-item">Edit</span>
    </div>
    <br>
    <br>
    <br>
    <?php
		$id=$_GET["id"];
		$query="select * from adresboek where id = $id;";
		$adressen=mysqli_query($conn,$query) or die("fout in sql!");
        $adres=mysqli_fetch_array($adressen);
	?>
    <form class="w3-container" method="post" action="update.php">
        <input type="hidden" name="frmID" value="<?php echo $adres["id"]; ?>">
        <div class="w3-row">
        <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmNaam">Achternaam: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmNaam" value="<?php echo $adres["naam"]; ?>">
        </div>
        <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmVoornaam">Voornaam: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmVoornaam" value="<?php echo $adres["voornaam"]; ?>">
        </div>
       <div class="w3-col m9 w3-padding">
            <label class="w3-text-teal" for="frmAdres">Straat: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmStraat" value="<?php echo $adres["straat"]; ?>">
        </div>
        <div class="w3-col m3 w3-padding">
            <label class="w3-text-teal" for="frmHuisnr">Huis nr.: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmHuisnr" value="<?php echo $adres["huisnummer"]; ?>">
        </div>
        <div class="w3-col m9 w3-padding">
            <label class="w3-text-teal" for="frmGemeente">Gemeente: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmGemeente" value="<?php echo $adres["gemeente"]; ?>">
        </div>
        <div class="w3-col m3 w3-padding">
            <label class="w3-text-teal" for="frmPostcode">Postcode: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmPostcode" value="<?php echo $adres["postcode"]; ?>">
        </div>
        <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmEmail">Email: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmEmail" value="<?php echo $adres["emailadres"]; ?>">
	    </div>
        <div class="w3-col m3 w3-padding">
            <label class="w3-text-teal" for="frmGsm">Gsm: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmGsm" value="<?php echo $adres["telefoon"]; ?>">
        </div>
	    <div class="w3-col m3 w3-padding">
        	<label class="w3-text-teal" for="frmGBdatum">Geb.Dat: </label>
                <input class="w3-input w3-border w3-light-grey" type="date" name="frmGBdatum" value="<?php echo $adres["geboortedatum"]; ?>">
        </div>
        <div class="w3-right">
            <input class="w3-button w3-blue-grey" type="button" value="Annuleer" onclick="window.location.href='index.php'">
		    <input class="w3-button w3-blue-grey" type="submit" value="Bewaar">
		</div>
	</div>
	</form>
    <br>
    <br>
    <br>
    <div class="w3-bar w3-teal w3-bottom">
        <span class="w3-bar-item">Arne Ramault</span>
    </div>
</body>
</html>