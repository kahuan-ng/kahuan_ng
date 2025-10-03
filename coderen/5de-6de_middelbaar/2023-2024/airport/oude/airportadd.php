<!DOCTYPE html>
<html>
    <head>
        <title>Airport</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    
    <body>
        <?php include_once "connect2db.inc"; ?>
        <h1>Airport</h1>

        <form method="post" action="save.php">
            <label for="frmNaam">Naam: </label>
            <input type="text" name="frmNaam" placeholder="naam">
            <input type="text" name="frmVoornaam" placeholder="voornaam">
            <br>
            		
            <label for="frmAddres">Straat: </label>
            <input type="text" name="frmStraat" placeholder="straat">
            <input type="text" name="frmHuisnummer" placeholder="huisnummer">

            <br>
             <label for="frmAddres"></label>Postcode: </label>
            <input type="text" name="frmPostcode" placeholder="postcode">
            <input type="text" name="frmGemeente" placeholder="gemeente">
            
            <br>
             <label for="frmGSM"></label>GSM: </label>
             <input type="text" name="frmTelefoon" placeholder="telefoon">
             <label for="e-mail"></label>e-mail: </label>
             <input type="text" name="frmEmail" placeholder="e-mail">
             
             <br>
              <label for="frmGeb.dat"></label>Gebr.dat.: </label>
             <input type="date" name="frmGeboorteDatum" placeholder="geboortedatum">



            

            		
            
            		
            <input type="button" value="annuleer" onclick="window.location.href='index.php'">
            <input type="submit" value="bewaar">
	</form>

        <h4> 2024 by @kahuanng</h4>
        <script src="script.js"></script>
    </body>
</html>
