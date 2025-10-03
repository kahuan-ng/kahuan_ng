<?php include_once "../../connect2db.inc"; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<?php
		$id=$_GET["id"];
		$query="delete from adresboek where id = $id;";
		$result=mysqli_query($conn,$query) or die("fout in sql!");
	?>
	De gegevens werden verwijderd.<br>
	<a href="index.php">Ga terug naar het adresboek.</a>
</body>
</html>