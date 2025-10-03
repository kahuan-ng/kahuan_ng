<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Beighton Zelftest</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="beightonscore.css" type="text/css">
    <style>
        .btn-accent {
            background-color: #7e57c2;
            color: white;
        }
        .btn-accent:hover {
            background-color: #5e35b1;
        }
        .text-primary {
            color: #1a237e;
        }
        #resultaat {
            border-left: 5px solid #00acc1;
        }
    </style>
</head>

<body class="w3-light-grey">

<?php include_once "header.inc"; ?>

<div class="w3-container w3-padding-32">
  <div class="w3-card w3-white w3-padding">
    <h2 class="text-primary">Beighton-score Zelftest</h2>
    <form id="beightonForm">
      <div id="slides"></div>
      <div class="w3-margin-top">
        <button type="button" class="w3-button btn-accent w3-round-large" onclick="vorigeVraag()">Vorige Vraag</button>
        <button type="button" class="w3-button btn-accent w3-round-large" onclick="volgendeVraag()">Volgende</button>
        <button type="button" class="w3-button w3-green w3-hide w3-round-large" id="toonResultaat" onclick="toonScore()">Toon Resultaat</button>
        <button type="button" class="w3-button w3-red w3-round-large" onclick="resetTest()">Reset Test</button>
      </div>
    </form>
    <div id="resultaat" class="w3-margin-top w3-padding w3-pale-blue w3-hide text-primary w3-round-large"></div>
  </div>
</div>

<!-- Modal voor e-mail -->
<div id="emailModal" class="w3-modal" style="z-index:9999;">
  <div class="w3-modal-content w3-animate-top w3-card-4 w3-round-large">
    <header class="w3-container w3-teal">
      <span onclick="document.getElementById('emailModal').style.display='none'" 
            class="w3-button w3-display-topright">&times;</span>
      <h2>Ontvang je resultaat via e-mail</h2>
    </header>
    <div class="w3-container w3-padding">
      <p>Wil je jouw resultaat ontvangen via e-mail? Vul je e-mailadres hieronder in:</p>
      <form onsubmit="verzendEmail(event)">
        <input type="email" id="emailInput" class="w3-input w3-border w3-round" placeholder="Jouw e-mailadres" required>
        <button type="submit" class="w3-button w3-green w3-margin-top w3-round-large">Verzenden</button>
      </form>
    </div>
  </div>
</div>


<?php include_once "footer.inc"; ?>
<script src="beightonscore.js"></script>
</body>
</html>
