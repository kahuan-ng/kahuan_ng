<?php include_once "../connect2db.inc"; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-bar w3-teal w3-large w3-top w3-padding">
        <span class="w3-bar-item">Recept</span>
    </div>
    <br>
    <br>
    <br>
    <form method="post" action="save_ingredient.php" class="w3-container">
        <div class="w3-row">
            <div class="w3-col m3 w3-padding">
                <?php $receptID = $_GET["receptID"]; ?>
                <input type="hidden" name="frmReceptID" value="<?php echo $receptID; ?>">    
                
                <label class="w3-text-teal " for="frmNaamIngredient">NaamIngredient</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmNaamIngredient">
            </div>
            <div class="w3-col m1 w3-padding">
                <label class="w3-text-teal" for="frmHoeveelheid">Hoeveelheid</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmHoeveelheid">
            </div>
            <div class="w3-col m1 w3-padding">
                <label class="w3-text-teal" for="frmEenheid">Eenheid</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmEenheid">
            </div>
                <div class="w3-col m1 w3-padding">
                <label class="w3-text-teal" for="frmDeelRecept">DeelRecept</label>
                <input class="w3-input w3-border w3-light-grey" type="text" name="frmDeelRecept">
            </div>
            <br>
            <br>
            <br>
            <div class="w3-right">
                <input class="w3-button w3-light-gray" type="button" value="annuleer" onclick="window.location.href='edit.php?id=<?php echo $_GET["receptID"]; ?>'">
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