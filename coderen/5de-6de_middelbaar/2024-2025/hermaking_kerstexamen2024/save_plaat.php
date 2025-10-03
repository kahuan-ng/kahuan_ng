<?php 
    include "../connect2db.inc";
        $titel=$_POST["frmTitel"];
        $uitvoerder=$_POST["frmUitvoerder"];
        $beschrijving=$_POST["frmBeschrijving"];
        $email=$_POST["frmEmail"];
        $query="INSERT INTO ww_platen (titel, uitvoerder, beschrijving, email) values ('$titel', '$uitvoerder', '$beschrijving', '$email');";
	$result=mysqli_query($conn,$query) or die("fout in sql!");
    header("Location: vragen.php");
?>