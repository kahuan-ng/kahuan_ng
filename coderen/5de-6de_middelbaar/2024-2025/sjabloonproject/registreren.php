<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <?php include_once "header_login.inc"; ?>
    <div class="w3-container">
        <div class="w3-card-4 w3-display-middle w3-row">
            <div class="w3-container w3-teal">
              <h1>Registreren</h1>
            </div>
        
            <form class="w3-container w3-padding-32" method="post" action="save_registratie.php" onsubmit="return validateRegisterForm()">
                <div class="w3-bar w3-red">
                    <?php echo $_SESSION["login_info"] ?? ''; ?>
                </div>
                
                <div id="commentaar" class="w3-text-red w3-padding"></div>
                
                <div class="w3-row-padding"> 
                    
                    <div class="w3-half w3-padding">
                        <label for="frmVoornaam">Voornaam</label>
                        <input class="w3-input" type="text" name="frmVoornaam" id="frmVoornaam">
                    </div>
                    
                    <div class="w3-half w3-padding">
                        <label for="frmNaam">Naam</label>
                        <input class="w3-input" type="text" name="frmNaam" id="frmNaam">
                    </div>

                    <div class="w3-full w3-padding">
                        <label for="frmEmailadres">E-mailadres</label> 
                        <input class="w3-input" type="text" name="frmEmailadres" id="frmEmailadres">
                    </div>
                    
                    <div class="w3-half w3-padding">
                        <label for="frmGebruikersnaam">Gebruikersnaam</label>
                        <input class="w3-input" type="text" name="frmGebruikersnaam" id="frmGebruikersnaam">
                    </div>
                    
                    <div class="w3-half w3-padding">
                        <label for="frmWachtwoord">Wachtwoord</label>
                        <input class="w3-input" type="password" name="frmWachtwoord" id="frmWachtwoord">
                    </div>

                    <div class="w3-half w3-padding">
                        <label for="frmTaal">Taal</label>
                        <select class="w3-select w3-padding" name="frmTaal" id="frmTaal">
                            <option value="en">English</option>
                            <option value="nl">Nederlands</option>
                            <option value="fr">Français</option>
                            <option value="de">Deutsch</option>
                        </select>
                    </div>
                    
                    <div class="w3-half w3-padding">
                        <label for="frmControleWachtwoord">Controle Wachtwoord</label>
                        <input class="w3-input" type="password" name="frmControleWachtwoord" id="frmControleWachtwoord">
                    </div>
                </div>
                    
                <div class="w3-padding w3-half">
                    <input class="w3-button w3-teal w3-right" type="submit" value="Registreer">
                </div>
                
                <div class="w3-padding w3-half">
                    <input class="w3-button w3-grey w3-right" type="button" value="Annuleren" onclick="window.location.href='index.php'">
                </div>
            </form>
        </div>
    </div>
    
    <?php include_once "footer_login.inc"; ?>
    <script src="script_login.js?2"></script>
</body>
</html>
