<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landen</title>
    <link rel="stylesheet" href="style.css?1" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-bar w3-teal w3-large w3-top">
        <form method="GET" class="w3-bar-item w3-input" style="display:inline;" action="landendb.php">
        <span class="w3-bar-item">landen</span>
            <input type="text" name="zoek" class="w3-input w3-bar-item" placeholder="zoek klant.."
            value="<?php echo isset($_GET['zoek']) ? $_GET['zoek'] : ''; ?>">
            <input type="submit" class="w3-bar-item w3-button w3-light-gray" value="zoek">
        </form>
        <div class="w3-padding">
            <button class="w3-bar-item w3-button w3-light-gray w3-right link"><a class="link" href="add.php">nieuw</a></button>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="w3-container">
    <?php 
        include("connect2db.inc");
        // Get the search input and sanitize it
        $zoek = isset($_GET['zoek']) ? mysqli_real_escape_string($conn, $_GET['zoek']) : '';
        // Adjust the query to use the search term
        $query = "SELECT * FROM land";
        if (!empty($zoek)) {
            $query .= " WHERE naam LIKE '%$zoek%' OR hoofdstad LIKE '%$zoek%' OR code LIKE '%$zoek%'";
        }
        $landen = mysqli_query($conn, $query) or die("Foutje: $query");
    ?>
    <table class="w3-table w3-striped"> 
        <thead>
            <tr class="w3-light-grey">
                <th>naam</th>
                <th>hoofdstad</th>
                <th>code</th>
                <th>vlag</th>
            </tr>
        </thead>
        <?php
            while($land=mysqli_fetch_array($landen)) {
        ?>
        <tr>
            <td><?php echo $land["naam"]; ?></td>
            <td><?php echo $land["hoofdstad"]; ?></td>
            <td><?php echo $land["code"]; ?></td>
            <td><img src="https://flagcdn.com/w640/<?php echo strtolower($land["code"]); ?>.png"></td>
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
</body>
</html>