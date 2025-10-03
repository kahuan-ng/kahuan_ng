<?php include_once "../connect2db.inc"; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-bar w3-teal w3-large w3-top w3-padding">
        <span class="w3-bar-item">Receptenboek</span>
    </div>
    <br>
    <br>
    <br>
    <?php
		$id = $_GET["id"];
		$query = "SELECT * from Recept where id = $id;";
		$recepten = mysqli_query($conn, $query) or die("fout in sql!");
        $recept = mysqli_fetch_array($recepten);
	?>
    <form class="w3-container" method="post" action="update.php">
        <input type="hidden" name="frmID" value="<?php echo $recept["id"]; ?>">
        <div class="w3-row">
       <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmNaam">Naam</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmNaam" value="<?php echo $recept["naam"]; ?>">
        </div>
        
        <div class="w3-col m6 w3-padding">
            <label class="w3-text-teal" for="frmAantalPersonen">Aantal personen</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmAantalPersonen" value="<?php echo $recept["aantal_personen"]; ?>">
        </div>
        
        <div class="w3-col m12 w3-padding">
            <label class="w3-text-teal" for="frmBereidingswijze">Bereidingswijze</label>
                <textarea class="w3-input w3-border w3-light-grey" rows="7" type="text" name="frmBereidingswijze"><?php echo $recept["bereidingswijze"];?></textarea>
        
    <?php
         $query = "SELECT * FROM Ingredient WHERE receptID = $id ORDER by naam";
         $ingredienten = mysqli_query($conn, $query) or die ("Fout in sql: $query");
    ?>
    
    <br>
    
    <h class="w3-text-teal" >Ingredient:</h>
    <br>
    <table class="w3-table w3-bordered w3-striped w3-hoverable w3-light-grey"> 
             <!--    <thead>
            <tr>
                <th class="w3-text-teal" >Ingredient:</th>
            </tr>
                </thead> -->
	<?php
            while ($ingredient=mysqli_fetch_array($ingredienten)) {
        ?>
            <tr>
                <td><?php echo $ingredient['hoeveelheid'], $ingredient['eenheid'];?></td>
                <td><?php echo $ingredient['naam'];?></td>
                <td><?php echo $ingredient['deelRecept'];?></td>


                <td>
                    <a href="delete_ingredient.php?ingredientNaam=<?php echo $ingredient["naam"]; ?>&receptID=<?php echo $recept["id"]; ?>" class="w3-button w3-teal">🗑</a>
                    <a href="edit_ingredient.php?ingredientNaam=<?php echo $ingredient["naam"]; ?>&receptID=<?php echo $recept["id"]; ?>" class="w3-button w3-teal">Edit</a>

                 <!--   <a href="delete_ingredient.php?receptID=<?php echo $recept["id"]; ?>" class="w3-button w3-teal">🗑</a> -->
                </td>
            </tr>
    <?php
        }
    ?>
    </table>
    <br>
        <a href="add_ingredient.php?receptID=<?php echo $recept["id"]; ?>" class="w3-button w3-teal">+</a>

        <div class="w3-right">
            <input class="w3-button w3-light-gray" type="button" value="annuleer" onclick="window.location.href='index.php'">
		    <input class="w3-button w3-teal" type="submit" value="bewaar">
		</div>
	</div>
	</form>
	
    <br>
    <br>
    <br>
    <div class="w3-bar w3-teal w3-bottom">
        <span class="w3-bar-item">(c) 2024 by Ka-Huan Ng</span>
    </div>
</body>
</html>