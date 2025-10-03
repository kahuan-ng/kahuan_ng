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
echo "Het product $product heeft een prijs van € $prijs exclusief btw. Het  product wordt verkocht aan € $verkoopprijs inclusief btw.";
    ?>
    
    <h1>Oefening 3</h1>
    <?php
        echo "Ik kan tellen van 1 tot 10.<br>";
    for ($i = 1; $i <= 10; $i++) {
        echo $i;
        if ($i < 10) {
            echo " ";
        }
    }
    ?>
        
    <h1>Oefening 4</h1>
    <?
        echo "Ik kan tellen van 1 tot 1000. <br>";
            for ($x = 0; $x <= 1000; $x+=1) {
                echo $x;
                echo " ";
                
            }

    ?>
    
        <h1>Oefening 5</h1>
        <ol>
        <?
            $klassen = array("5MO", "5OMC", "5AIT", "5ITN", "6OMC", "6MO", "6AIT", "6ITN");
            sort($klassen);
            $total_klassen = count($klassen);
                foreach ($klassen as $x) {
                echo "<li> $x <br>";
                }
        ?>
        </ol>
        <?
            echo "Er zijn $total_klassen verschillende klassen in 3TSO. <br>";
        ?>
</body>
</html>