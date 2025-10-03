<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0"?>
    <link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
<?php include_once "../connect2db.inc"; ?>
   <div class ="w3-bar w3-red">
        <a href="acties.php" class = "w3-bar-item w3-button w3-right">Acties</a>
        <a href="nieuwsbrief.php" class = "w3-bar-item w3-button w3-right">Nieuwsbrief</a>
        <a href="line_up.php" class = "w3-bar-item w3-button w3-right">Line-up</a>
        <a href="vragen.php" class = "w3-bar-item w3-button w3-right">Vragen</a>
        <a href="aftellen.php" class = "w3-bar-item w3-button w3-right">Aftellen</a>
    </div>
    
    <a href="homepagina.php">
        <img src="logo.png" alt="logo" style="width:80px;height:42px;position: relative; top: -20px;">
    </a>
    
    <h1 class="w3-container w3-text-red">Vraag een plaat aan</h1>
    <br>
    <h3 class="w3-container w3-text-black">
        Studio Brussel en MNM draaien 7 dagen lang jouw verzoekplaten. Vraag ze nu aan!
    </h3>
    
    <p class="w3-container w3-text-black">Beter nog, geef je postcode en krijg het laatste nieuw
    uit jouw buurt.</p>
    
    <h1 class="w3-container w3-text-black">Welke plaat wens je aan te vragen?</h1>
    
    <form class="w3-container" method="post" action="save_plaat.php">
            <div class ="w3-col m12 w3-padding">
                <label class="w3-text-black" for="frmTitel">Titel</label>
                    <input class="w3-input w3-border" type="text" name="frmTitel">
            </div>

    
            <div class="w3-row">
                <div class ="w3-col m12 w3-padding">
                    <label class="w3-text-black" for="frmUitvoerder">Uitvoerder</label>
                        <input class="w3-input w3-border" type="text" name="frmUitvoerder">
                </div>
            </div>
        
        <h1 class="w3-container w3-text-black">Beschrijf kort waarom je deze plaat aanvraagt.</h1>
        
            <div class ="w3-col m12 w3-padding">
                <label class="w3-text-black" for="frmBeschrijving">Beschrijving</label>
                    <textarea class="w3-input w3-border" rows="3" type="text" name="frmBeschrijving"></textarea>
            </div>
            
            <div class ="w3-col m12 w3-padding">
                <label class="w3-text-black" for="frmEmail">Email *</label>
                    <input class="w3-input w3-border" type="text" name="frmEmail">
            </div>
            <br>
            <br>
            <br>
            <div class="w3-container w3-left">
	            <input class="w3-button w3-round-large w3-blue" type="submit" value="Vraag aan >">
	        </div>
    </form>
    
    <script="script.js"></script>
</body>
</html>