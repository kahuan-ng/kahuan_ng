<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="dagboek_CSS/dagboek_table.css" type="text/css">
</head>

<body>
<?php include_once "../connect2db.inc"; ?>
    <header class="header w3-padding w3-bar w3-teal">
        <span class="w3-bar-item">Dagboek</span>
        <a href="add_dagboek.php" class="w3-bar-item w3-button w3-black w3-right">Add</a>
    </header>

        <div class ="div1_main" style = "text-align: center;"> <!-- De grote titel -->
            <h1 class = "">Centrum</h1>
        </div>

    <?php
        $dagboek_query = "SELECT * FROM dag_verhaal ORDER BY dag DESC";
        $dagboek = mysqli_query($conn, $dagboek_query) or die ("Fout in sql: $dagboek_query");
    ?>


<div class="verhaal_container w3-container w3-padding" style="padding-left: 20px; padding-right: 20px;">
    <table class="w3-table w3-striped w3-border">
        <thead class="thead">
            <tr>
                <th>Onderwerp</th>
                <th>datum</th>
                <th>Verhaal</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php
                while ($dag = mysqli_fetch_array($dagboek)) {
            ?>
            <tr class="clickable-row" data-url="edit_dagboek.php?id=<?php echo $dag['id']; ?>">
                <td><?php echo $dag['onderwerp'];?></td>
                <td><?php echo $dag['dag'];?></td>
                <td><a href="verhaal_dagboek.php?id=<?php echo $dag['id']; ?>" class="w3-button w3-round-large w3-green">KLIK HIER VOOR VERHAAL</a></td>
                <td><a href="delete_dagboek.php?id=<?php echo $dag["id"]; ?>" class="w3-button w3-round-large w3-red">Delete</a></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>    
</div> 
    
    <footer class ="w3-bar w3-bottom w3-teal">
        <span class ="w3-bar-item">(c) 2024 by Ka-Huan Ng</span>
    </footer>
    
    <script src="script_dagboek.js"></script>
</body>
</html>