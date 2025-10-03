<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="dagboek_CSS/add_edit_dagboek.css" type="text/css">
</head>

<body>
<?php include_once "../connect2db.inc"; ?>
    <header class ="w3-bar w3-teal ">
        <span class ="w3-bar-item">De Header</span>
    </header>

    <?php 
        $id = $_GET["id"];
        $edit_query = "SELECT * FROM dag_verhaal WHERE id = $id;";
        $dagboek= mysqli_query($conn, $edit_query) or die("fout in SQL!");
        $dag= mysqli_fetch_array($dagboek);
    ?>

        <div class ="div1_main" style = "text-align: center;"> <!-- De grote titel -->
            <h1>Edit dagboek</h1>
        </div>

    <div class="w3-card-4 w3-white w3-margin">
        <div class="w3-container" style="background-color: #2e4a4e; color: white;">
            <h2>Pas je verhaal aan</h2>
        </div>

        <!-- Verhaal Formulier -->
    <form class="w3-padding" method="post" action="update_dagboek.php">
            <input type="hidden" name="frmID" value="<?php echo $dag["id"]; ?>">

        <div class= "w3-padding">
            <label><b>Onderwerp</b></label>
            <input class ="w3-input w3-border" type="text" name="frmOnderwerp" id="frmOnderwerp" value="<?php echo $dag['onderwerp'];?>">
        </div>
        
        <div class="w3-padding">
            <label><b>Verhaal</b></label>
            <textarea class="w3-input w3-border" name="frmVerhaal" id="frmVerhaal" rows="10" ><?php echo $dag['verhaal'];?></textarea>
        </div>

        <div class="w3-row" style="align-items: baseline;">
            <div class="w3-padding w3-half w3-left w3-align">
                <input id="submit-button" class="w3-button w3-round-large" type="submit" value="submit"></input>
            </div>

            <div class="w3-padding w3-half w3-right">
                <a href="dagboek.php" id="terug-button" class="w3-button w3-round-large w3-margin-bottom w3-right">Terug</a>
            </div>

        </div>
    </form>
    </div> 
       
    <footer class ="w3-bar w3-teal">
        <span class ="w3-bar-item">(c) 2024 by Ka-Huan Ng</span>
    </footer>
    
    <script src="script.js"></script>
</body>
</html>