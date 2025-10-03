<!DOCTYPE html>
<html>
    <head>
        <title>Adresboek</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    
    <body>
        <?php include_once "connect2db.inc"; ?>
        <h1>Adresboek</h1>
        <?php 
            $query = "select * from adresboek order by naam, voornaam;";
            $adressen = mysqli_query($conn,$query) or die ("Fout in sql: $query");
        ?>
        
        <table width="100%" border="1">
            <tr>
                <th>naam</th>
                <th>adres</th>
                <th>telefoon</th>
                <th>e-mail</th>
                <td><a href="add.php">📄</a></td>
            </tr>    
            <?php 
                while ($adres=mysqli_fetch_array($adressen)) {
                    extract ($adres);
            ?>
            <tr>
                <td><?php echo $adres["id"]?></td>
                <td><?php echo $adres["straat"] . ", " . $adres["huisnummer"] , ","
                                . $adres["postcode"] . " " . $adres["gemeente"]; ?></td>
                <td><?php echo $adres["telefoon"] ?></td>
                <td><?php echo $adres["emailadres"] ?></td>
                <td>✏️🗑</td>
            </tr>
            <?php
                }
            ?>
            
        </table>
        
        <h4> 2024 by @kahuanng</h4>
        <script src="script.js"></script>
    </body>
</html>
