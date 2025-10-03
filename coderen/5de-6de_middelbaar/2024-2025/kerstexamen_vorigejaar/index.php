<?php include_once "../connect2db.inc";?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptenboek</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="w3-bar w3-teal w3-large w3-top">
        <span class="w3-bar-item">Receptenboek</span>
        <button class="w3-bar-item w3-button w3-light-gray w3-right link"><a class="link" href="add.php">nieuw</a></button>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="w3-container">
   <?php
         $query = "SELECT * FROM Recept";
         $query .= " ORDER BY naam;";
         $recepten = mysqli_query($conn, $query) or die ("Fout in sql: $query");
    ?>
    <table class="w3-table w3-striped w3-hoverable"> 
        <thead>
            <tr class="w3-light-grey">
                <th>Naam</th>
                <th>Aantal personen</th>
            </tr>
        </thead>
        <?php
            while ($recept=mysqli_fetch_array($recepten)) {
        ?>
        <tr class="clickable-row" data-url="edit.php?id=<?php echo $recept['id']; ?>">
            <td><?php echo $recept["naam"];?></td>
            <td><?php echo $recept["aantal_personen"]; ?></td>
            <td><a class="link" href="delete.php?id=<?php echo $recept["id"]; ?>">🗑</a></td>
        </tr>
    <?php
        }
    ?>
    </table>
    <br>
    <br>
    <br>
    </div>
    <div class="w3-bar w3-teal w3-bottom">
        <span class="w3-bar-item">(c) 2024 by Ka-Huan Ng</span>
    </div>
    
    <script src="script.js"></script> 
    
    <script>
        document.querySelectorAll(".clickable-row").forEach(row => {
            row.addEventListener("click", function() {
                window.location.href = this.dataset.url;
            });
        });
    </script>

</body>
</html>