<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0"?>
    <link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php include_once "../connect2db.inc";?>
   <div class ="w3-bar w3-red">
        <a href="acties.php" class = "w3-bar-item w3-button w3-right">Acties</a>
        <a href="nieuwsbrief.php" class = "w3-bar-item w3-button w3-right">Nieuwsbrief</a>
        <a href="line_up.php" class = "w3-bar-item w3-button w3-right">Line-up</a>
        <a href="faq.php" class = "w3-bar-item w3-button w3-right">Vragen</a>
        <a href="aftellen.php" class = "w3-bar-item w3-button w3-right">Aftellen</a>
    </div>
    
    <a href="homepagina.php">
        <img src="logo.png" alt="logo" style="width:80px;height:42px;position: relative; top: -20px;">
    </a>
    
    <div class="w3-container w3-blue w3-round-large w3-text-white">
        <h1>Acties voor de warmste week</h1>
    </div>
    
    <p class="w3-container">Wil je graag De Warmste Week Steunen? Organiseer dan een actie en zamel geld in voor alle 276 projecten van het DWW-fonds</p>
    
    <div class="w3-container">
        <button class="w3-bar-item w3-round-large w3-button w3-red w3-left w3-padding-24">
            <a class="link" href="registratie_acties.php">Organiseer ook een actie ></a></button>
    </div>
    <br>
    
    <div>
        <?php
             $query = "SELECT * FROM ww_acties";
             $query .= " ORDER BY naam;";
             $acties = mysqli_query($conn, $query) or die ("Fout in sql: $query");
        ?>
        <?php
            while ($actie=mysqli_fetch_array($acties)) {
        ?>
        
        <div class="w3-container w3-margin w3-border w3-white w3-round-large">
            <h1 class="w3-text-red"><?php echo $actie["naam"];?></h1>
            <p><?php echo $actie["beschrijving"];?></p>
            <hr>
            <i class='fas fa-calendar-alt' style="color:red"></i> <span><?php echo $actie["datum"];?></span>
            <i class='fas fa-map-marker-alt' style="color:red"></i> <span><?php echo $actie["locatie"];?></span>
            <i class="fas fa-money" style="color:red"></i> <span><?php echo $actie["doelbedrag"];?></span>
            <p></p>
        </div>
        <br>
    </div>
     <?php
        }
    ?>
    <script="script.js"></script>
</body>
</html>