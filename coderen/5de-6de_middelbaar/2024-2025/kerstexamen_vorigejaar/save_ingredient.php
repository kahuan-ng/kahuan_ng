<?php 
    include "../connect2db.inc";
    $receptID =$_POST["frmReceptID"];
    $naamIngredient=$_POST["frmNaamIngredient"];
    $hoeveelheid=$_POST["frmHoeveelheid"];
    $eenheid=$_POST["frmEenheid"];
    $deelRecept=$_POST["frmDeelRecept"];
    $query="INSERT INTO Ingredient (receptID, naam, hoeveelheid, eenheid, deelRecept) values ('$receptID','$naamIngredient', '$hoeveelheid', '$eenheid', '$deelRecept');";
	$result=mysqli_query($conn,$query) or die("fout in sql!");
    header("Location: edit.php?id=$receptID");
?>