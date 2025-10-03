<?php include_once "../../connect2db.inc"; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-bar w3-teal w3-xlarge w3-top">
        <span class="w3-bar-item">Add</span>
    </div>
    <br>
    <br>
    <br>
    <form class="w3-container" method="post" action="save.php">
        <div class="w3-row">
        <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmNaam">Achternaam: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmNaam" placeholder="Achternaam">
        </div>
        <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmVoornaam">Voornaam: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmVoornaam" placeholder="Voornaam">
        </div>
       <div class="w3-col m9 w3-padding">
            <label class="w3-text-teal" for="frmAdres">Straat: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmStraat" placeholder="Straat">
        </div>
        <div class="w3-col m3 w3-padding">
            <label class="w3-text-teal" for="frmHuisnr">Huis nr.: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmHuisnr" placeholder="Huis nr.">
        </div>
        <div class="w3-col m9 w3-padding">
            <label class="w3-text-teal" for="frmGemeente">Gemeente: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmGemeente" placeholder="Gemeente">
        </div>
        <div class="w3-col m3 w3-padding">
            <label class="w3-text-teal" for="frmPostcode">Postcode: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmPostcode" placeholder="Postcode">
        </div>
        <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmEmail">Email: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmEmail" placeholder="Email">
	    </div>
        <div class="w3-col m3 w3-padding">
            <label class="w3-text-teal" for="frmGsm">Gsm: </label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmGsm" placeholder="Gsm">
        </div>
	    <div class="w3-col m3 w3-padding">
        	<label class="w3-text-teal" for="frmGBdatum">Geb.Dat: </label>
                <input class="w3-input w3-border w3-light-grey" type="date" name="frmGBdatum" placeholder="Geboorte datum">
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