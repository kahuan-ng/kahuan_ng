<?php include_once "../../connect2db.inc"; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adresboek</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-bar w3-teal w3-xlarge w3-top">
        <span class="w3-bar-item">Adresboek</span>
    </div>
    <br>
    <br>
    <br>
    <div class="w3-container">
    <?php
        $query = "select * from adresboek order by naam, voornaam;";
        $adressen = mysqli_query($conn, $query) or die ("Fout in sql: $query");
    ?>
    <table class="w3-table w3-striped"> 
        <thead>
            <tr class="w3-blue-grey">
                <th>Naam</th>
                <th class="w3-hide-small">Adres</th>
                <th>Telefoon</th>
                <th>E-mail</th>
                <th><a class="link w3-margin-left" href="add.php">📄</a></th>
            </tr>
        </thead>
        <?php
            while ($adres=mysqli_fetch_array($adressen)) {
        ?>
        <tr>
            <td><?php echo $adres["naam"] . ", " . $adres["voornaam"]; ?></td>
            <td class="w3-hide-small"><?php echo $adres["straat"] . " " . $adres["huisnummer"] . ", " . $adres["postcode"] . " " . $adres["gemeente"]; ?></td>
            <td>
                <a href="tel:<?php echo $adres["telefoon"] ?>">
                    <?php echo $adres["telefoon"] ?>
                </a>
            </td>
            <td>
                <a href="mailto:<?php echo $adres["emailadres"] ?>">
                   <span class="w3-hide-large w3-hide-medium">✉️</span> 
                   <span class="w3-hide-small"><?php echo $adres["emailadres"] ?></span>
                </a>
            </td>
        <td>
        <a class="link" href="edit.php?id=<?php echo $adres["id"]; ?>">✏️</a>
        <a class="link" href="delete.php?id=<?php echo $adres["id"]; ?>">🗑</a>
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
        <span class="w3-bar-item">Ka-Huan Ng</span>
    </div>
</body>
</html>