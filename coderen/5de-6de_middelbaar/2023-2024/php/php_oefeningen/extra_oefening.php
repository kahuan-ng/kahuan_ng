<!DOCTYPE html>
<html>
<head>
<style>
table, tr ,th {
    border-spacing:15px black border;
}
</style>
<title>Oefeningen php</title>
</head>

<body>
    <h1>Oefening 1</h1>
    <?php
        $naam = "Ka-Huan";
        $leeftijd = 17;
        $klas = "5ADB";
        
        echo "Mijn naam is $naam. Ik ben $leeftijd en ik zit in $klas.";
    ?>
    <h2>Oefening 2</h2>
    
    <?php
        $product = "Apple Macbook Air 13";
        $prijs =  830;
        $verkoopprijs = 1004.3;
        const BTWpercentage = 21;
echo "Het product $product heeft een prijs van $prijs exclusief btw. Het  product wordt verkocht aan $verkoopprijs inclusief btw.";
    ?>
    
    <h1>Oefening 3</h1>
    <table>
    <?php
        for($rij=1;$rij<=10;$rij+=1) {
            echo "<tr>";
        }
    ?>
    </table> 
        
    <h1>Oefening 4</h1>
<?
        for($x=0;$x<=9;$x+=1) {
            for($y=0;$y<=9;$y+=1) {
                for($z=0;$z<=9;$z+=1) {
                    if ("$x$y$z"=="999") {
                        echo "$x$y$z.";
                    } else {
                        echo "$x$y$y, ";
                    }    
                }
            
            }
        }
?>
</body>
</html>