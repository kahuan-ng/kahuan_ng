<?php 
    include "../connect2db.inc";
    $receptID = $_POST["frmReceptID"];
    $naamIngredient=$_POST["frmNaamIngredient"];
    $hoeveelheid=$_POST["frmHoeveelheid"];
    $eenheid=$_POST["frmEenheid"];
    $deelRecept=$_POST["frmDeelRecept"];
    $query="UPDATE Ingredient set naam='$naamIngredient', hoeveelheid='$hoeveelheid', eenheid='$eenheid', deelRecept='$deelRecept' where receptID= $receptID;";
	$result=mysqli_query($conn,$query) or die("fout in sql!");
    header("Location: edit.php?id=$receptID");
?>