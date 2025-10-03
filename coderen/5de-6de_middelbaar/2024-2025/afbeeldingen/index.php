<!DOCTYPE html>
<html>
<head>
    <title>Afbeeldingen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <?php include_once("../connect2db.inc") ?>
    <header class="w3-container w3-deep-purple w3-card w3-top">
        <a href="index.php" class="w3-bar-item w3-xxlarge w3-button">Afbeelding</a>  
        <a href="add.php" class="w3-bar-item w3-button w3-right w3-xxlarge">+</a>
    </header>
    <br><br><br>
    
    <div class="w3-container">
        <?php
        $query = "select * from afbeelding";
        $afbeeldingen = mysqli_query($conn,$query) or die ("Fout in $query");
        while ($afbeelding=mysqli_fetch_array($afbeeldingen)) {
            $foto = base64_encode($afbeelding["afbeelding"]);
        ?>
        <hr>
        <div class="w3-cell-row" onclick="window.location.href='edit.php?id=<? echo $afbeelding['id'] ?>'">
          <div class="w3-cell w3-mobile" style="width:30%">
            <img src="data:image/jpg;charset=utf8;base64,<?echo $foto ?>" style="width:100%">
          </div>
          <div class="w3-cell w3-container w3-mobile">
            <h3><? echo $afbeelding["naam"] ?></h3>
            <p><? echo $afbeelding["beschrijving"] ?></p>
          </div>
        </div>  
        <?php
        }
        ?>
    </div>
    
    <br>
    <br>
    <br>
    
    <footer class="w3-container w3-bottom w3-deep-purple">
		<h3>© 2024 by @kahuanng</h3>
    </footer>
</body>
</html>