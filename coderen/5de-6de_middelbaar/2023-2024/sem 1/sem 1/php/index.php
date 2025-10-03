<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP oefeningen</title>
</head>
<body>
    <h1>My first PHP page</h1>
    
    <h2>OEf1</h2>
    
    <?php
        $name = "Arne";
        $leeftijd = 16;
        $klas = "5ADB";
            echo "Mijn naam is $name. Ik ben $leeftijd jaar oud en ik zit in de klas $klas.";
    ?>
    
    <h2>OEf2</h2>
    
    <?php
        define("BTW", 21);
            $product = 'Apple MacBook Air 13" M1 chip with 8-core CPU and 7-core GPU, 256GB - Gold - Azerty FR';
            $prijs = 830;
            $verkoopprijs = ($prijs * BTW / 100)+$prijs;
        echo "Het product $product heeft een prijs van € $prijs exclusief btw.<br>";
        echo "Het product wordt verkocht aan € $verkoopprijs inclusief btw.";
    ?>
    
    <h2>OEf3</h2>
    
    <?php
        echo "Ik kan tellen van 1 tot 1000.<br>";
            for ($x = 1; $x <= 1000; $x++) {
            echo "$x ";}
    ?>
    
    <h2>OEf4</h2>
    
    <?php
        $klassen = array("5MO", "5OMC", "5AIT", "5ITN", "6OMC", "6MO", "6AIT", "6ITN");
        sort($klassen);
        echo "<ol>";
        foreach($klassen as $value) {
                echo "<li>$value</li>";
        }
        echo "</ol>";
        echo "Er zijn " . count($klassen)." verschillende klassen in 3TSO.";
    ?>
</body>
</html>