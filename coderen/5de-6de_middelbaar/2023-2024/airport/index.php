<!DOCTYPE html>
<html>
<head>
	<title>Airports</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
	<?php include("../connect2db.inc"); ?>
	<form action="index.php" method="get" class="w3-container w3-top w3-pink">
		<span class="w3-bar-item">Airports / Luchthavens</span>
		
		<input type="submit" class="w3-bar-item w3-button w3-green w3-right" 
		    value="Zoek..">
		<input type="text" class="w3-bar-item w3-input w3-right placeholder="zoek..">
	</form>
	<?php
		$query = "select * from airports order by name;";
		$airports = mysqli_query($conn,$query) or die ("Fout in sql: $query");
	?>
	<br><br><br><br><br>	
	<div class="w3-container">

	<table class="w3-table w3-striped w3-bordered">
		<tr class="w3-pale-red">
			<th>naam</th>
			<th>stad, land</th>
			<th class="w3-hide-small">IATA / ICAO</th>
			<th class="w3-hide-small">timezone</th>
		</tr>

		<?php
			while ($airport=mysqli_fetch_array($airports)) {
		?>
				
		<tr onclick="window.location='display.php?id=<?php echo $airport["airportid"]; ?>'">
			<td><?php echo $airport["name"]; ?></td>
			<td><?php echo $airport["city"] . ", " . $airport["country"]; ?></td>
			<td class="w3-hide-small"><?php echo $airport["IATA"] . " / " . $airport["ICAO"]; ?></td>
			<td class="w3-hide-small"><?php echo $airport["tz"]; ?></td>
		</tr>

		 <?php
			 }
		 ?>
	</table>
	
	</div>
	
	<div class="w3-container w3-bottom w3-pink">
		<h4>© <?php echo date("Y") ?> by @jurgenbert</h4>
	</div>
	<script src="script.js"></script>
</body>
</html>