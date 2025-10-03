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
    
    <div class="w3-bar w3-red w3-large w3-top">
        <a href="index.php" class="w3-bar-item w3-button" style="position: absolute; top: -30px; left: 20px;">
            <img src="logo.png" style="height:40px;" alt="Receptenboek Logo">
        </a>
    </div>
    
    <div class="w3-bar w3-red w3-large w3-top">
        <span class="w3-bar-item"></span>
        <a href="acties.php" class="w3-bar-item w3-button w3-right">Acties</a>
        <a href="nieuwsbrief.php" class="w3-bar-item w3-button w3-right">Nieuwsbrief</a>
        <a href="line_up.php" class="w3-bar-item w3-button w3-right">Line-up</a>
        <a href="vragen.php" class="w3-bar-item w3-button w3-right">Vragen</a>
        <a href="aftellen.php" class="w3-bar-item w3-button w3-right">Aftellen</a>
    </div>
    
    <div class="w3-container w3-center w3-blue w3-round-large">
        <h1 style="margin-bottom: 0; padding: 10px 0;">Ontdek de line-up van de warmste concerten</h1>
    </div>
    
    <php>Wil je graag De Warmste steunen? Organiseer dan een acie en zamel geld in vor alle 276 projecten van het DWW-fonds.</php>
    

    <br><br><br>
    
        <div class="w3-left">
		    <input class="w3-button w3-teal w3-round-large" type="submit" value="Organiseer ook een actie >">
		</div>

    
    <div class="w3-bar w3-red w3-bottom">
        <span class="w3-bar-item">(c) 2024 by Ka-Huan Ng</span>
    </div>
    
    <script src="script.js"></script>
</body>
</html>
