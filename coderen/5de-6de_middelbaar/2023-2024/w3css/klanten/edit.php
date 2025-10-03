<?php include_once "../connect2db.inc"; ?>
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
    <div class="w3-bar w3-teal w3-large w3-top w3-padding">
        <span class="w3-bar-item">K L A N T E N</span>
    </div>
    <br>
    <br>
    <br>
    <?php
		$id=$_GET["id"];
		$query="select * from klanten where id = $id;";
		$klanten=mysqli_query($conn,$query) or die("fout in sql!");
        $klant=mysqli_fetch_array($klanten);
	?>
    <form class="w3-container" method="post" action="update.php">
        <input type="hidden" name="frmID" value="<?php echo $klant["id"]; ?>">
        <div class="w3-row">
       <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmVoornaam">voornaam</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmVoornaam" value="<?php echo $klant["voornaam"]; ?>">
        </div>
        <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmNaam">naam</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmNaam" value="<?php echo $klant["naam"]; ?>">
        </div>
       <div class="w3-col w3-padding">
            <label class="w3-text-teal" for="frmStraat">straat</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmStraat" value="<?php echo $klant["straat"]; ?>">
        </div>
        <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmPostcode">postcode</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmPostcode" value="<?php echo $klant["postcode"]; ?>">
        </div>
        <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmGemeente">gemeente</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmGemeente" value="<?php echo $klant["gemeente"]; ?>">
        </div>
        <div class="w3-col m9 w3-padding">
            <label class="w3-text-teal" for="frmEmail">e-mailadres</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmEmail" value="<?php echo $klant["email"]; ?>">
	    </div>
        <div class="w3-col m3 w3-padding">
            <label class="w3-text-teal" for="frmTelefoon">telefoon</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmTelefoon" value="<?php echo $klant["telefoon"]; ?>">
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