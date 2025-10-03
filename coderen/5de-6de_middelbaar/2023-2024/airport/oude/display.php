<!DOCTYPE html>
<html>
    <head>
        <title>Adresboek</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    
    <body>
        <?php include_once "connect2db.inc"; ?>
        <h1>Airport</h1>
        <?php 
            $query = "select * from adresboek order by naam, voornaam;";
            $airport = mysqli_query($conn,$query) or die ("Fout in sql: $query");
            ?>
        
        <table width="100%" border="1">
            <tr>
                <th>naam</th>
                <th>stad, land</th>
                <th>IATA/ICAO</th>
                <th>timezone</th>
                
                


        </body>
</html>
