<?php 
    include "../connect2db.inc";
        $naam=$_POST["frmNaam"];
        $postcode=$_POST["frmPostcode"];
        $email=$_POST["frmEmail"];
        $query="INSERT INTO ww_nieuwsbrief (naam, postcode, email) values ('$naam', '$postcode', '$email');";
	$result=mysqli_query($conn,$query) or die("fout in sql!");
    header("Location: nieuwsbrief.php");
?>