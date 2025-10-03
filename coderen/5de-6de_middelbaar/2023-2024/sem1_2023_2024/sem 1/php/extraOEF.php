<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extra oefeningen</title>
</head>
<body>
    <h2>OEf1</h2>
    
    <?php
        date_default_timezone_set("Europe/Brussels");
        $t = date("H");
        if ($t < "12") {
            $tijd = "Goedemorgen";
        }elseif ($t >= "12" && $t <= "18") {
            $tijd = "Goededag";
        }else {
            $tijd = "Goedeavond";
        }
        
       
        $l = date("l");
        switch ($l) {
            case $l == "Monday":
                $dag = "maandag";
            break;
            case $l == "Tuesday":
                $dag = "dinsdag";
            break;
            case $l == "Wednesday":
                $dag = "woensdag";
            break;
            case $l == "Thursday":
                $dag = "donderdag";
            break;
            case $l == "Friday":
                $dag = "vrijdag";
            break;
            case $l == "Saturday":
                $dag = "zaterdag";
            break;
            case $l == "Sunday":
                $dag = "zondag";
            break;
        }
   
        $datum = date("d/m/Y");
        
        echo "$tijd, we zijn vandaag $dag, $datum" 
    ?>
    
    <h2>OEf2</h2>
    <table>
    <?php
    for ($x = 1; $x <= 10; $x+=1) {
        echo "<tr><td>";
        $y = 6;
        $z = $x * $y;
        echo "$y x $x = $z";
        echo "</td></tr>";
    }
    ?>
    </table>
    
    <h2>OEf3</h2>
    
    <table border="1">
    <?php
        for($rij=1; $rij<=10; $rij+=1) {
            echo "<tr>";
            for($kolom=1; $kolom<=10; $kolom+=1) {
                echo "<td>";
                echo $kolom * $rij;
                echo "</td>";
            }
            echo "</tr>"; 
        }
    ?>
    </table>
    
    <h2>OEf4</h2>
    
    <?php
    for($x=0; $x<=9; $x+=1) {
        for($y=0; $y<=9; $y+=1) {
            for($z=0; $z<=9; $z+=1) {
                if ($x==9 && $y==9 && $z==9) { //of 'if ("$x$y$z"=="999")'
                    echo "$x$y$z";
                } else {
                    echo "$x$y$z, ";
                }
                
            }
        }
    }
    ?>
    
</body>
</html>