<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="registreren.css" type="text/css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
    </style>
</head>

<body style="background-color: #e0f2f1; color: #263238;">
<header class="w3-bar w3-padding-16" style="background-color: #2e4a4e; color: white; display: flex; align-items: center; justify-content: center; position: relative;">
    <a href="index.php" style="position: absolute; left: 16px; display: flex; align-items: center;">
        <img src="hypermobility_logo.png" alt="Hypermobility Central Logo" style="height: 50px; margin-bottom: 2px;" />
    </a>
    <h1 style="margin: 0; font-size: 24px;">Register</h1>
</header>

<main>
  <div class="w3-container">
    <div class="w3-card-4 w3-white w3-row">  <!-- w3-display-middle is verwijderd -->
      <div class="w3-container" style="background-color: #2e4a4e; color: white;">
        <h1>Register</h1>
      </div>

      <form class="w3-container w3-padding-32" method="post" action="save_registratie.php" onsubmit="return validateRegisterForm()">
          <?php if (!empty($_SESSION["login_info"])): ?>
          <div class="w3-padding w3-round" style="background-color: #ffcc80; color: #263238;">
              <?php echo $_SESSION["login_info"]; unset($_SESSION["login_info"]); ?>
          </div>
          <?php endif; ?>
          
          <div id="commentaar" class="w3-text-red w3-padding"></div>

          <div class="w3-row-padding"> 
              <div class="w3-half w3-padding">
                  <label for="frmVoornaam"><b>Voornaam</b></label>
                  <input class="w3-input w3-border w3-round" type="text" name="frmVoornaam" id="frmVoornaam" style="background-color: #e0f2f1;" required />
              </div>
              
              <div class="w3-half w3-padding">
                  <label for="frmNaam"><b>Naam</b></label>
                  <input class="w3-input w3-border w3-round" type="text" name="frmNaam" id="frmNaam" style="background-color: #e0f2f1;" required />
              </div>

              <div class="w3-full w3-padding">
                  <label for="frmEmailadres"><b>Emailadres</b></label> 
                  <input class="w3-input w3-border w3-round" type="email" name="frmEmailadres" id="frmEmailadres" style="background-color: #e0f2f1;" required />
              </div>
              
              <div class="w3-full w3-padding">
                  <label for="frmGebruikersnaam"><b>Gebruikersnaam</b></label>
                  <input class="w3-input w3-border w3-round" type="text" name="frmGebruikersnaam" id="frmGebruikersnaam" style="background-color: #e0f2f1;" required />
              </div>
              
              <div class="w3-half w3-padding">
                  <label for="frmWachtwoord"><b>Wachtwoord</b></label>
                  <input class="w3-input w3-border w3-round" type="password" name="frmWachtwoord" id="frmWachtwoord" style="background-color: #e0f2f1;" required />
              </div>

              <div class="w3-half w3-padding">
                  <label for="frmControleWachtwoord"><b>Controle Wachtwoord</b></label>
                  <input class="w3-input w3-border w3-round" type="password" name="frmControleWachtwoord" id="frmControleWachtwoord" style="background-color: #e0f2f1;" required />
              </div>
          </div>
              
          <div class="w3-padding w3-half">
              <input class="w3-button w3-round w3-right" type="submit" value="Registreer"
                     style="background-color: #00ff9d; color: #2e4a4e;" />
          </div>
          
          <div class="w3-padding w3-half">
              <input class="w3-button w3-round w3-right" type="button" value="Annuleren"
                     onclick="window.location.href='index.php'"
                     style="background-color: #73d9e7; color: #2e4a4e;" />
          </div>
      </form>
    </div>
  </div>
</main>

    <footer class="w3-bar w3-center w3-padding-16" style="background-color: #2e4a4e; color: white;">
        <h2>Hypermobiliteit</h2>
    </footer>

<script src="script_login.js?2"></script>
</body>
</html>