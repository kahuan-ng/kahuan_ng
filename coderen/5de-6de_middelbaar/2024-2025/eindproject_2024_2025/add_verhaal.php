<?php
session_start();
if (!isset($_SESSION['gebruikersnaam'])) {
    // Niet ingelogd? Doorverwijzen naar inlogpagina
    header("Location: aanmelden.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Verhaal Delen</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="header.css" type="text/css">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            background-color: #e0f2f1;
            color: #263238;
        }
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            padding-top: 1rem;
        }
        .form-card {
            max-width: 600px;
            width: 100%;
        }
    </style>
</head>
<body>
<?php include_once "header.inc"; ?>

<div class="content">
    <div class="w3-card-4 w3-white w3-margin form-card">
        <div class="w3-container" style="background-color: #2e4a4e; color: white;">
            <h2>Vertel ons jouw ervaring</h2>
        </div>

        <!-- Verhaal Formulier -->
        <form class="w3-container w3-padding form-body" method="post" action="save_verhalen.php">

            <label for="onderwerp"><b>Onderwerp</b></label>
            <input class="w3-input w3-border w3-round" type="text" name="frmOnderwerp_verhaal" id="frmOnderwerp_verhaal" placeholder="Onderwerp" required>

            <label for="verhaal"><b>Je verhaal</b></label>
            <textarea class="w3-input w3-border w3-round" name="frmVerhaal" id="frmVerhaal" rows="6" placeholder="Vertel hier je ervaring of vraag" required></textarea>

            <?php if (!empty($_SESSION["bericht_info"])): ?>
                <div class="w3-panel w3-padding w3-round w3-margin-top" 
                     style="background-color: <?php echo ($_SESSION["bericht_success"] ?? false) ? '#4CAF50' : '#f44336'; ?>; color: white;">
                    <strong><?php echo $_SESSION["bericht_info"]; ?></strong>
                </div>
                <?php 
                unset($_SESSION["bericht_info"]); 
                unset($_SESSION["bericht_success"]);
                ?>
            <?php endif; ?>

            <div class="w3-padding w3-center">
                <input class="w3-button w3-indigo w3-round-large w3-margin-top w3-padding-large" type="submit" value="Verzenden" style="width: 100%;">
            </div>
            <div class="w3-padding w3-center">
                <a href="delen_verhalen.php" class="w3-button w3-light-grey w3-round w3-margin-bottom" style="width: 100%;">Terug</a>
            </div>
        </form>
    </div>
</div>

<?php include_once "footer.inc"; ?>
</body>
</html>