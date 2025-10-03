<?php 
    include "../connect2db.inc";
        $naam=$_POST["frmNaam"];
        $aantalPersonen=$_POST["frmAantalPersonen"];
        $bereidingswijze=$_POST["frmBereidingswijze"];
        $query="INSERT INTO Recept (naam, aantal_personen, bereidingswijze) values ('$naam', '$aantalPersonen', '$bereidingswijze');";
	$result=mysqli_query($conn,$query) or die("fout in sql!");
    header("Location: index.php");
?>