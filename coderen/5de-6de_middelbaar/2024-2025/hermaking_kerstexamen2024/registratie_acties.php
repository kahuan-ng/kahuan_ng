<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
   <div class ="w3-bar w3-red">
        <a href="acties.php" class = "w3-bar-item w3-button w3-right">Acties</a>
        <a href="nieuwsbrief.php" class = "w3-bar-item w3-button w3-right">Nieuwsbrief</a>
        <a href="line_.php" class = "w3-bar-item w3-button w3-right">Line-up</a>
        <a href="vragen.php" class = "w3-bar-item w3-button w3-right">Vragen</a>
        <a href="aftellen.php" class = "w3-bar-item w3-button w3-right">Aftellen</a>
    </div>
    
    <a href="homepagina.php">
        <img src="logo.png" alt="logo" style="width:80px;height:42px;position: relative; top: -20px;">
    </a>
    
    <div class="w3-container w3-blue w3-round-large">
        <h1 class="w3-text-white">Een actie registreren</h1>
    </div>
    
    <form class="w3-container" method="post" action="save_acties.php">
        <h2 class="w3-container">Geef je actie een naam</h2>
        <div class ="w3-col m12 w3-padding">
            <label class="w3-text-black" for="frmNaam">Naam</label>
                <input class="w3-input w3-border" type="text" name="frmNaam">
        </div>

        <h2 class="w3-container">Beschrijf je actie kort.</h2>
         <div class ="w3-col m12 w3-padding">
                <label class="w3-text-black" for="frmBeschrijving">Beschrijving</label>
                    <textarea class="w3-input w3-border" rows="2" type="text" name="frmBeschrijving"></textarea>
        </div>

        <h2 class="w3-container">Wanneer gaat je actie door?</h2>
        <div class ="w3-col m3 w3-padding">
              <label for="frmDatum">Date:</label>
                  <input class="w3-input w3-border w3-light-grey" type="date" name="frmDatum">
        </div>
        
        <h2 class="w3-container">Waar gaat je actie door?</h2>
        <div class ="w3-col m12 w3-padding">
            <label class="w3-text-black" for="frmLocatie">Locatie</label>
                <input class="w3-input w3-border" type="text" name="frmLocatie">
         </div>
         
        <h2 class="w3-container">Hoeveel wenst je op te halen?</h2>
        <div class ="w3-col m12 w3-padding">
            <label class="w3-text-black" for="frmBedrag">Doelbedrag</label>
                <input class="w3-input w3-border" type="text" name="frmBedrag">
         </div>

        <br>
        <br>
        <br>
        <div class="w3-container w3-left">
            <input class="w3-button w3-round-large w3-blue" type="submit" value="Registreer >">
        </div>
    </form>
    
    
    <script="script.js"></script>
</body>
</html>