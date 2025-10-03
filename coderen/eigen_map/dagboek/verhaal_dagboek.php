<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
    <link rel = "stylesheet" href= "dagboek_CSS/verhaal_dagboek.css"  >
</head>

<body class="body">
<?php include_once "../connect2db.inc"; ?>
<header class ="w3-bar w3-teal ">
    <span class ="w3-bar-item">Dagboek</span>
</header>

<div class="verhaal_card w3-card-4 w3-padding">
    <div id="verhaal_bar" class="w3-white">
        <h2 class="w3-container w3-teal w3-padding">Verhaal</h2>
    </div>

        <?php // -> de php-query om de gevegevens van de data base te halen. //
            $id = $_GET["id"];
            $verhaal_query = "SELECT * FROM dag_verhaal WHERE id = $id";
            $verhalen = mysqli_query($conn, $verhaal_query) or die ("Fout in SQL!");
            $verhaal = mysqli_fetch_array($verhalen);
        ?>
    
    <div class="verhaal w3-container w3-margin w3-border">
        <p><?php echo $verhaal["verhaal"];?></p>
    </div>

    <div>
        <a href="dagboek.php" class="w3-button w3-round-large" style="background-color: aliceblue; color:darkgrey;">Terug</a>
    </div>
</div>

<footer class ="w3-bar w3-teal">
    <span class ="w3-bar-item">(c) 2024 by Ka-Huan Ng</span>
</footer>
    
    <script src="script.js"></script>
</body>
</html>