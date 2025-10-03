<?php include_once "../connect2db.inc";?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptenboek</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    
    <a href="index.php">
        <img src="logo.png" alt="logo" style="float:left;width:42px;height:42px;">
    </a>
    
    <div class="w3-bar w3-red w3-large w3-top">
        <span class="w3-bar-item"></span>
        <a href="acties.php" class="w3-bar-item w3-button w3-right">Acties</a>
        <a href="nieuwsbrief.php" class="w3-bar-item w3-button w3-right">Nieuwsbrief</a>
        <a href="line_up.php" class="w3-bar-item w3-button w3-right">Line-up</a>
        <a href="vragen.php" class="w3-bar-item w3-button w3-right">Vragen</a>
        <a href="aftellen.php" class="w3-bar-item w3-button w3-right">Aftellen</a>
    </div>
    
    <br>
    <br>
    <br>
    <br>
    <br>

    
        <div class ="w3-container w3-center w3-text-red">
            <h1>Vraag een plaat aan</h1>
        </div>
        
            <div class="w3-center">
                <p>Studio Brussel en MNM draaien 7 dagen jouw verzoekplaten. <br> Vraag ze nu aan!</p>
            </div>
                
            <div class="w3-center">
                <p></ph><em>Beter nog geef jouw code krijg het laatste niews uit jouw beurt.</em></p>
            </div>
            
            <div class = "w3-center">
                <h1>Welke plaat wens je aan te vragen.</h1>
            </div>

    <form class="w3-container" method="post" action="vragen.php">
        <div class="w3-row">
            <div class="w3-col m12 w3-padding w3-center">
                <label class="w3-text-black" for="frmTitel">Titel</label>
                    <input class="w3-input w3-border w3-light-grey w3-center" type="text" name="frmTitel">
            </div>
            <div class="w3-col m12 w3-padding w3-center">
                <label class="w3-text-black" for="frmUitvoerder">Uitvoerder</label>
                    <input class="w3-input w3-border w3-light-grey w3-center" type="text" name="frmUitvoerder">
            </div>
            <br>
        <div class="w3-center">
            <h1>Beschrijf Kort waarom je deze plaat aanvraagt.</h1>
        </div>
            <div class="w3-col m12 w3-padding w3-center">
                <label class="w3-text-black w3-center" for="frmBereidingswijze">Beschrijving</label>
                    <textarea class="w3-input w3-border w3-light-grey w3-center" rows="7" type="text" name="frmBeschrijving"></textarea>
        </div>
            <div class="w3-col m12 w3-padding">
                <label class="w3-text-black" for="frmEmail">e-mailadres</label>
                    <input class="w3-input w3-border w3-light-grey" type="text" name="frmEmail">
	        </div>
        </div>
        <br>
        
        <div class="w3-left">
		    <input class="w3-button w3-teal w3-round-large" type="submit" value="vraag aan >">
		</div>
	</div>
	</form>
    <br>
    <br>
    <br>
    <div class="w3-bar w3-red w3-bottom">
        <span class="w3-bar-item">(c) 2024 by Ka-Huan Ng</span>
    </div>
    
    <script src="script.js"></script>
</body>
</html>