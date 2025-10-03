<?php include_once "connect2db.inc"; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klanten</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-bar w3-teal w3-large w3-top">
        <form method="GET" class="w3-bar-item w3-input" style="display:inline;" action="index.php">
        <span class="w3-bar-item">K L A N T E N</span>
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
        //$search = isset($_GET['zoek']) ? mysqli_real_escape_string($conn, $_GET['zoek']) : '';
        if (isset($_GET["zoek"])) {
            $search = $_GET["zoek"];
        } else {
            $search = "";
        }
        $query = "SELECT * FROM klanten";
        if ($search != "") {
            $query .= " WHERE voornaam LIKE '%$search%' OR naam LIKE '%$search%' OR gemeente LIKE '%$search%' ";
        }
        $query .= " ORDER BY naam, voornaam;";
        $klanten = mysqli_query($conn, $query) or die ("Fout in sql: $query");
    ?>
    <table class="w3-table w3-striped"> 
        <thead>
            <tr class="w3-light-grey">
                <th>naam</th>
                <th>adres</th>
                <th>e-mail</th>
                <th>telefoon</th>
                <th></th>
            </tr>
        </thead>
        <?php
            while ($klant=mysqli_fetch_array($klanten)) {
        ?>
        <tr>
            <td><?php echo $klant["naam"] . ", " . $klant["voornaam"]; ?></td>
            <td><?php echo $klant["straat"] . ", " . $klant["postcode"] . " " . $klant["gemeente"]; ?></td>
            <td>
                <a href="mailto:<?php echo $klant["email"] ?>">
                   <span><?php echo $klant["email"] ?></span>
                </a>
            </td>
            <td>
                <a href="tel:<?php echo $klant["telefoon"] ?>">
                    <?php echo $klant["telefoon"] ?>
                </a>
            </td>
            
        <td>
        <a class="link" href="edit.php?id=<?php echo $klant["id"]; ?>">✏️</a>
        <a class="link" href="delete.php?id=<?php echo $klant["id"]; ?>">🗑</a>
        </td>
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
        <span class="w3-bar-item">(c) 2024 by Arne Ramault</span>
    </div>
</body>
</html>