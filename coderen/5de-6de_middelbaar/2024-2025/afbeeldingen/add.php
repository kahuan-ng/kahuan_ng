<!DOCTYPE html>
<html>
<head>
	<title>Afbeeldingen</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<? include_once("../connect2db.inc") ?>
	<header class="w3-container w3-deep-purple w3-card w3-top">
		<a href="index.php" class="w3-bar-item w3-xlarge w3-button">Afbeelding toevoegen</a>  
	</header>
	<br><br><br><br>
	
	<div class="w3-container">
		<div class="w3-card-4">
			<div class="w3-container w3-deep-purple w3-hide-small">
		  		<h2>Voeg toe</h2>
			</div>
		
			<form class="w3-container w3-padding" method="post" action="save.php" enctype="multipart/form-data">
				<label>Naam</label>
				<input class="w3-input w3-border" type="text" name="naam">
				<br>
				<label>Beschrijving</label>
				<textarea class="w3-input w3-border" name="beschrijving" style="resize:none;"></textarea>
				<br>
				<input type="file" class="w3-input" name="afbeelding">
				<br>
				<input class="w3-btn w3-deep-purple" type="submit" value="Bewaar">
			</form>
		</div>
	</div>
	
	<footer class="w3-container w3-bottom w3-deep-purple">
		<h3>© 2024 by @kahuanng</h3>
	</footer>
</body>
</html>
