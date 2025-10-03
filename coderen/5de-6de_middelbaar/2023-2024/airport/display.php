<!DOCTYPE html>
<html>
<head>
	<title>Airports</title>
   <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"
    type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"
    type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
	<?php include("../connect2db.inc"); ?>
	<div class="w3-container w3-top w3-pink">
		<h1>Airports / Luchthaven</h1>
	</div>
	<?php
		if (!isset($_GET["id"])) { $id = ""; } else { $id =  $_GET["id"]; }
		$query = "select * from airports where airportid = $id;";
		$airports = mysqli_query($conn,$query) or die ("Fout in sql: $query");
	?>
	<br><br><br><br><br>	
	<?php
		if ($airport=mysqli_fetch_array($airports)) {
	?>

	<div class="w3-display-container body">
		<div class="w3-container">
			<div class="w3-bar w3-pale-red w3-large">
				<button class="w3-bar-item w3-btn w3-grey" onclick="window.location='index.php'">&lt;&nbsp;terug</button>
				<span class="w3-bar-item"><? echo $airport["name"]; ?></span>
			</div>
			
			<div class="w3-row">
				<div class="w3-col m6 w3-padding">
					<label class="w3-text-teal"><b>stad</b></label>
					<input class="w3-input w3-border w3-light-grey" type="text" value="<? echo $airport["city"]; ?>" readonly>
				</div>
				<div class="w3-col m6 w3-padding">
					<label class="w3-text-teal"><b>land</b></label>
					<input class="w3-input w3-border w3-light-grey" type="text" value="<? echo $airport["country"]; ?>" readonly>
				</div>
			</div>
			<div class="w3-row">
				<div class="w3-col m3 w3-padding">
					<label class="w3-text-teal w3-tooltip">
						<b>IATA</b>
						<span style="position:absolute;left:0;bottom:18px" class="w3-text w3-tag">
							International Airport Transportat Association
						</span>
					</label>
					<input class="w3-input w3-border w3-light-grey" type="text" value="<? echo $airport["IATA"] ?>" readonly>
				</div>
				<div class="w3-col m3 w3-padding">
					<label class="w3-text-teal w3-tooltip">
						<b>ICAO</b>
						<span style="position:absolute;left:0;bottom:18px" class="w3-text w3-tag">
							International Civil Aviation Organization
						</span>
					</label>
					<input class="w3-input w3-border w3-light-grey" type="text" value="<? echo $airport["ICAO"] ?>" readonly>
				</div>
				<div class="w3-col m6 w3-padding">
					<label class="w3-text-teal"><b>latitude / longitude</b></label>
					<input class="w3-input w3-border w3-light-grey" type="text" value="<? echo $airport["latitude"] ?> / <? echo $airport["longitude"] ?>" readonly>
				</div>
			</div>
		</div>
	</div>
	
	<div class="w3-container" style="height: 50vh" id="mapContainer"></div>

	
	
	
	<? } ?>
	
	<div class="w3-container w3-bottom w3-pink">
		<h4>© 2024 by @jurgenbert</h4>
	</div>
	
	    <script>
      // Initialize the platform object
      var platform = new H.service.Platform({
        'apikey': 'LqYuNUextCHVzIHdg9dJ8903iL--JyZ8ERVg-yAfBKY'
      });

      // Obtain the default map types from the platform object
      var maptypes = platform.createDefaultLayers();

      // Instantiate (and display) the map
      var map = new H.Map(
        document.getElementById('mapContainer'),
        maptypes.vector.normal.map,
        {
          zoom: 14
          center: { lng: <? echo $airport["longitude"] ?>", lat: <? echo $airport["latitude"] ?> }
        });
    </script>

	<script src="script.js"></script>
</body>
</html>