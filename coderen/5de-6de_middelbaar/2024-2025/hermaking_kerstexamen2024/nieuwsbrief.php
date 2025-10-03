<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0"?>
    <link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
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
    
    <h1 class ="w3-container w3-text-red">Mis niets van De Warmste Week</h1>
    <br>
    <h3 class="w3-container">Krijg hartverwarmende verhalen uit heel vlaanderen rechtstreeks in jouw mailbox. Daar teken je toch voor?</h3>
    <br>
    <p class="w3-container">Beter nog, geef je postcode en krijg het laatste nieuws uit jouw buurt.</p>
    
    <form class="w3-container" method="post" action="save_nieuwsbrief.php">
        <div class ="w3-col m12 w3-padding">
            <label class="w3-text-black" for="frmNaam">Naam</label>
                <input class="w3-input w3-border" type="text" name="frmNaam">
        </div>

        <div class ="w3-col m12 w3-padding">
            <label class="w3-text-black" for="frmPostcode">Postcode</label>
                <input class="w3-input w3-border" type="text" name="frmPostcode">
         </div>

        <div class ="w3-col m12 w3-padding">
            <label class="w3-text-black" for="frmEmail">E-mailadres *</label>
                <input class="w3-input w3-border" type="text" name="frmEmail">
        </div>
        <br>
        <br>
        <br>
        <div class="w3-container w3-left">
            <input class="w3-button w3-round-large w3-blue" type="submit" value="Verzenden >">
        </div>
    </form>
    
    <script="script.js"></script>
</body>
</html>