<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0"?>
    <link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
<?php include_once "../connect2db.inc";?>
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
        <h1>Vragen De Warmste Week 2024</h1>
    </div>
    
    <br>
    
    <div class="w3-container">
        <?php
             $query = "SELECT * FROM ww_vragen";
             $query .= " ORDER BY vraag;";
             $vragen = mysqli_query($conn, $query) or die ("Fout in sql: $query");
        ?>
        <?php
            while ($vraag=mysqli_fetch_array($vragen)) {
        ?>
        
        <div class="w3-container w3-border w3-white w3-round-large">
            <h1 class="w3-text-red"><?php echo $vraag["vraag"];?></h1>
            <br>
            <p><?php echo $vraag["antwoord"];?></p>
            <br>
        </div>
        <br>
    </div>
     <?php
        }
    ?>
    

    <script="script.js"></script>
</body>
</html>