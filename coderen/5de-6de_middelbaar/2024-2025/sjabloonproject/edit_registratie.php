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
</head>

<body>
    <?php include_once "../connect2db.inc"; ?>
    <?php include_once "header_login.inc"; ?>
    <div class="w3-container">
        <div class="w3-card-4 w3-display-middle w3-row">
            <div class="w3-container w3-teal">
              <h1>Inloggen</h1>
            </div>
            
            <?php
                $id=$_GET["id"];
                $query="select * from login_systeem where id = $id;";
        		$gebruikers=mysqli_query($conn,$query) or die("fout in sql!");
                $gebruiker=mysqli_fetch_array($gebruikers);
            ?>
            <form class="w3-container w3-padding-32" method="post" action="update_registratie.php" onsubmit="return validateRegisterForm()">
            <input type="hidden" name="frmID" value="<?php echo $gebruiker["id"]; ?>">
                <div class="w3-bar w3-red">
                    <?php echo $_SESSION["login_info"] ?? ''; ?>
                </div>
                
                <div class="w3-row-padding"> 
                    
                    <div class="w3-half w3-padding">
                        <label>Voornaam</label>
                        <input class="w3-input" type="text" name="frmVoornaam" id="voornaam" value="<?php echo $gebruiker["voornaam"] ?>">
                    </div>
                    
                    <div class="w3-half w3-padding">
                        <label for="frmNaam">Naam</label>
                        <input class="w3-input" type="text" name="frmNaam" id="naam" value="<?php echo $gebruiker["naam"] ?>">
                    </div>

                    <div class="w3-full w3-padding">
                        <label for="frmEmailadres">E-mailadres</label> 
                        <input class="w3-input" type="text" name="frmEmailadres" id="emailadres" value="<?php echo $gebruiker["emailadres"] ?>">
                    </div>
                    
                    <div class="w3-half w3-padding">
                        <label for="frmGebruikersnaam">Gebruikersnaam</label>
                        <input class="w3-input" type="text" name="frmGebruikersnaam" id="gebruikersnaam" value="<?php echo $gebruiker["gebruikersnaam"] ?>">
                    </div>
                    
                    <div class="w3-half w3-padding">
                        <label for="frmWachtwoord">Wachtwoord</label>
                        <input class="w3-input" type="password" name="frmWachtwoord" id="wachtwoord" value="">
                    </div>

                    <div class="w3-half w3-padding">
                        <label for="frmTaal">Taal</label>
                        <select class="w3-select w3-padding" name="frmTaal" id="taal" value="<?php echo $gebruiker["taal"] ?>">
                            <option value="en">English</option>
                            <option value="nl">Nederlands</option>
                            <option value="fr">Français</option>
                            <option value="de">Deutsch</option>
                        </select>
                    </div>
                    
                    <div class="w3-half w3-padding">
                        <label for="frmControleWachtwoord">Controle Wachtwoord</label>
                        <input class="w3-input" type="password" name="frmControleWachtwoord" id="controleWachtwoord value="<?php echo $gebruiker["controleWachtwoord"] ?>"">
                    </div>
                </div>
                    
                <div class="w3-padding w3-half">
                    <input class="w3-button w3-gray w3-right" type="submit" value="Registreer">
                </div>
                
                <div class="w3-padding w3-half">
                    <input class="w3-button w3-teal w3-right" type="button" value="Annuleren" onclick="window.location.href='index.php'">
                </div>
            </form>
        </div>
    </div>
    
    <?php include_once "footer_login.inc"; ?>
    <script src="script_login.js"></script>
</body>
</html>