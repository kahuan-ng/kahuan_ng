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
		<a href="index.php" class="w3-bar-item w3-xlarge w3-button">Afbeelding wijzigen</a>  
	</header>
	<br><br><br><br>
	
	<div class="w3-container">
		<div class="w3-card-4">
			<div class="w3-container w3-deep-purple w3-hide-small">
				  <h2>Wijzig</h2>
			</div>

			<?php
			$id = $_GET["id"];
			$query = "select * from afbeelding where id = $id";
			$afbeeldingen = mysqli_query($conn,$query) or die ("Fout in $query");
			if ($afbeelding=mysqli_fetch_array($afbeeldingen)) {
				$foto = base64_encode($afbeelding["afbeelding"]);
			?>

			<form class="w3-container w3-padding" method="post" action="update.php" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<? echo $afbeelding["id"] ?>">
				
				<label>Naam</label>
				<input class="w3-input w3-border" type="text" name="naam" value="<? echo $afbeelding["naam"] ?>">
				<br>
				<label>Beschrijving</label>
				<textarea class="w3-input w3-border" name="beschrijving" style="resize:none;"><? echo $afbeelding["beschrijving"] ?></textarea>
				<br>
				
				<img src="data:image/jpg;charset=utf8;base64,<? echo $foto ?>" style="width:100%">
				<input type="file" class="w3-input" name="afbeelding">
				<br>
				<input class="w3-right w3-btn w3-grey" type="button" value="Annuleer" onclick="window.location.href='index.php'">
				<input class="w3-btn w3-red" type="button" value="Verwijder" onclick="window.location.href='delete.php?id=<? echo $afbeelding["id"] ?>'">
				<input class="w3-right w3-btn w3-deep-purple" type="submit" value="Bewaar">
			</form>
		
			<? } ?>
		</div>
	</div>
	<br><br><br>
	<footer class="w3-container w3-bottom w3-deep-purple">
		<h3>© 2024 by @kahuanng</h3>
	</footer>
</body>
</html>
