<!DOCTYPE html>
<html>
    <head>
        <title>Airport</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    
    <body>
        <?php include_once "../connect2db.inc"; ?>
        <h1>Airport/luchthavens</h1>
        <?php 
            $query = "select * from airports order by name;";
            $airports = mysqli_query($conn,$query) or die ("Fout in sql: $query");
            ?>
        
        <table width="100%" border="1">
            <tr>
                <th>naam</th>
                <th>stad,land</th>
                <th>IATA/ICAO</th>
                <th>Timezone</th>
            </tr>    
            <?php 
                while ($airport=mysqli_fetch_array($airports)) {
            ?>
            <tr>
                <td><?php echo $airport["name"]; ?></td>
                <td><?php echo $airport["city"] . ", " . $airport["country"]; ?></td>
                <td><?php echo $airport["IATA"] . ", " . $airport["ICAO"]?></td>
                <td><?php echo $airport["timezone"] ?></td>
            </tr>
            <?php
                }
            ?>
            
        </table>
        
        <h4> 2024 by @kahuanng</h4>
        <script src="script.js"></script>
    </body>
</html>
