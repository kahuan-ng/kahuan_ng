<?php include_once "../connect2db.inc";?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warmste Week</title>
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
    
    <div class="w3-row">
        <div class="w3-col m6 s12" style="position: relative;">
            <img src="presentatoren.jpg" class="w3-border" alt="presentatoren" style="width: 100%; height: auto;">
            <div class="w3-container w3-yellow w3-round-large w3-center" style="position: absolute; bottom: 10px; left: 50%; width: 50%; transform: translateX(-50%);">
                <a href="vragen.php" style="text-decoration: none; color: black;">
                    <h2 style="margin-bottom: 0; padding: 10px 0;">Vraag je plaat aan</h2>
                </a>
            </div>
        </div>
        
        <div class="w3-col m6 s12" style="position: relative;">
            <img src="acties.jpg" class="w3-border" alt="acties" style="width: 100%; height: auto;">
            <div class="w3-container w3-blue w3-round-large w3-center" style="position: absolute; bottom: 10px; left: 50%; width: 50%; transform: translateX(-50%);">
                <a href="nieuwsbrief.php" style="text-decoration: none; color: white;">
                    <h2 style="margin-bottom: 0; padding: 10px 0;">Registreer hier je actie</h2>
                </a>
            </div>
        </div>
    
        <div class="w3-col m6 s12" style="position: relative;">
            <img src="lineup.jpg" class="w3-border" alt="lineup" style="width: 100%; height: auto;">
            <div class="w3-container w3-blue w3-round-large w3-center" style="position: absolute; bottom: 10px; left: 50%; width: 50%; transform: translateX(-50%);">
                <a href="line_up.php" style="text-decoration: none; color: white;">
                    <h2 style="margin-bottom: 0; padding: 10px 0;">Ontdek hier de line-up</h2>
                </a>
            </div>
        </div>
    
        <div class="w3-col m6 s12" style="position: relative;">
            <img src="brugge.jpg" class="w3-border" alt="brugge" style="width: 100%; height: auto;">
            <div class="w3-container w3-yellow w3-round-large w3-center" style="position: absolute; bottom: 10px; left: 50%; width: 50%; transform: translateX(-50%);">
                <a href="aftellen.php" style="text-decoration: none; color: black;">
                    <h2 style="margin-bottom: 0; padding: 10px 0;">Kom naar Brugge!</h2>
                </a>
            </div>
        </div>
    </div>


    <br>
    <br>
    <br>
    </div>
    <div class="w3-bar w3-red w3-bottom">
        <span class="w3-bar-item">(c) 2024 by Ka-Huan Ng</span>
    </div>
    
    <script src="script.js"></script>
</body>
</html>