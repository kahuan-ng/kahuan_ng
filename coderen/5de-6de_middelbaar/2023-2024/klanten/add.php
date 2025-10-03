<?php include_once "connect2db.inc"; ?>
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
    <div class="w3-bar w3-teal w3-large w3-top w3-padding">
        <span class="w3-bar-item">K L A N T E N</span>
    </div>
    <br>
    <br>
    <br>
    <form class="w3-container" method="post" action="save.php">
        <div class="w3-row">
        <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmVoornaam">voornaam</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmVoornaam">
        </div>
        <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmNaam">naam</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmNaam">
        </div>
       <div class="w3-col w3-padding">
            <label class="w3-text-teal" for="frmStraat">straat</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmStraat">
        </div>
        <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmPostcode">postcode</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmPostcode">
        </div>
        <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmGemeente">gemeente</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmGemeente">
        </div>
        <div class="w3-col m9 w3-padding">
            <label class="w3-text-teal" for="frmEmail">e-mailadres</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmEmail">
	    </div>
        <div class="w3-col m3 w3-padding">
            <label class="w3-text-teal" for="frmTelefoon">telefoon</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmTelefoon">
        </div>
        <div class="w3-right">
            <input class="w3-button w3-light-gray" type="button" value="annuleer" onclick="window.location.href='index.php'">
		    <input class="w3-button w3-teal" type="submit" value="bewaar">
		</div>
	</div>
	</form>
    <br>
    <br>
    <br>
    <div class="w3-bar w3-teal w3-bottom">
        <span class="w3-bar-item">(c) 2024 by Arne Ramault</span>
    </div>
</body>
</html>