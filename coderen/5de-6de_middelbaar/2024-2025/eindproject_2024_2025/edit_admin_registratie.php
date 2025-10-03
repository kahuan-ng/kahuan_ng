<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body style="background-color: #e0f2f1;">
    <?php include_once "../connect2db.inc"; ?>

   <header class="w3-bar w3-padding-16" style="background-color: #2e4a4e; color: white; display: flex; align-items: center; justify-content: center; position: relative;">
    
        <a href="index.php" style="position: absolute; left: 16px; display: flex; align-items: center;">
            <img src="hypermobility_logo.png" alt="Hypermobility Central Logo" style="height: 50px; margin-bottom: 2px;">
        </a>
    
        <h1 style="margin: 0; font-size: 24px;">Edit</h1>
    
    </header>    
    <div class="w3-container">
        <div class="w3-card-4 w3-white w3-display-middle w3-row" style="max-width: 600px;">
            <div class="w3-container" style="background-color: #2e4a4e; color: white;">
                <h1>Edit</h1>
            </div>
            
            <?php
                $id = $_GET["id"];
                $query = "SELECT * FROM gebruikers WHERE id = $id;";
                $gebruikers = mysqli_query($conn, $query) or die("Fout in SQL!");
                $gebruiker = mysqli_fetch_array($gebruikers);
            ?>
            
            <!-- Update formulier -->
            <form id="updateForm" class="w3-container w3-padding-32" method="post" action="update_registratie.php" onsubmit="return validateRegisterForm()">
                <input type="hidden" name="frmID" value="<?php echo $gebruiker["id"]; ?>">

                <div class="w3-row-padding"> 
                    <div class="w3-half w3-padding">
                        <label for="frmVoornaam"><b>Voornaam</b></label>
                        <input class="w3-input w3-border w3-round" type="text" name="frmVoornaam" id="voornaam" value="<?php echo $gebruiker["voornaam"] ?>" style="background-color: #e0f2f1;" required>
                    </div>
                    
                    <div class="w3-half w3-padding">
                        <label for="frmNaam"><b>Naam</b></label>
                        <input class="w3-input w3-border w3-round" type="text" name="frmNaam" id="naam" value="<?php echo $gebruiker["naam"] ?>" style="background-color: #e0f2f1;" required>
                    </div>

                    <div class="w3-full w3-padding">
                        <label for="frmEmailadres"><b>Emailadres</b></label> 
                        <input class="w3-input w3-border w3-round w3-border w3-round" type="email" name="frmEmailadres" id="emailadres" value="<?php echo $gebruiker["emailadres"] ?>" style="background-color: #e0f2f1;" required>
                    </div>
                    
                    <div class="w3-full w3-padding">
                        <label for="frmGebruikersnaam"><b>Gebruikersnaam</b></label>
                        <input class="w3-input w3-border w3-round" type="text" name="frmGebruikersnaam" id="gebruikersnaam" value="<?php echo $gebruiker["gebruikersnaam"] ?>" style="background-color: #e0f2f1;" required>
                    </div>
                    
                    <div class="w3-half w3-padding">
                        <label for="frmWachtwoord"><b>Wachtwoord</b></label>
                        <input class="w3-input w3-border w3-round" type="password" name="frmWachtwoord" id="wachtwoord" style="background-color: #e0f2f1;">
                    </div>

                    <div class="w3-half w3-padding">
                        <label for="frmControleWachtwoord"><b>Controle Wachtwoord</b></label>
                        <input class="w3-input w3-border w3-round" type="password" name="frmControleWachtwoord" id="controleWachtwoord" style="background-color: #e0f2f1;">
                    </div>
                </div>
            </form>

            <!-- Knoppen en Delete Formulier in één rij -->
            <div class="w3-row w3-padding" style="max-width: 600px; margin-top: 16px;">
                <div class="w3-half w3-left">
                    <!-- Knoppen binnen het updateForm sturen -->
                    <input form="updateForm" class="w3-button w3-round" type="submit" value="Opslaan"
                           style="background-color: #00ff9d; color: #2e4a4e; margin-left: 25px;">
                    <input class="w3-button w3-round" type="button" value="Annuleren"
                           onclick="window.location.href='admin.php'"
                           style="background-color: #73d9e7; color: #2e4a4e;">
                </div>

                <div class="w3-half w3-right">
                    <form method="post" action="delete_registratie.php" 
                          onsubmit="return confirm('Weet je zeker dat je dit account wilt verwijderen? Dit kan niet ongedaan gemaakt worden.');">
                        <input type="hidden" name="frmID" value="<?php echo $gebruiker['id']; ?>">
                        <input type="submit" value="Account verwijderen" 
                               style="background-color: #ff5252; color: white;  margin-left: 18px;" 
                               class="w3-button w3-round">
                    </form>
                </div>
            </div>
        </div>
    </div>

        <div class="w3-padding w3-center">
            <a href="beighton_resultaat_overzicht.php?id=<?php echo $gebruiker['id']; ?>" class="w3-button w3-indigo w3-round">Beighton Resultaten</a>
        </div>

    <?php
    if (isset($_SESSION['rechten']) && $_SESSION['rechten'] === 'admin') {
        echo '
        <div class="w3-container w3-center" style="margin-top: 16px;">
            <button class="w3-button w3-round" style="color:white; background-color: #7e57c2;" onclick="window.location.href=\'admin.php\'">Admin Pagina</button>
        </div>'
        ;
    }
    ?>

    <footer class="w3-bar w3-center w3-bottom w3-padding-16" style="background-color: #2e4a4e; color: white;">
        <h2>Hypermobiliteit</h2>
    </footer>
    
    <script src="script_login.js"></script>
</body>
</html>
