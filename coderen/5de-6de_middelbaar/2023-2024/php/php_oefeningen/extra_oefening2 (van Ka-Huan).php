<!DOCTYPE html>
<html>
<head>
    
</head>

<body>    
<H1>Oefening 1</H1>
    <?
        $tijd = date("H");
        $dagNummer = date("N");

    
        if ($tijd < 12) {
            $begroeting = "Goedemorgen";
        } elseif ($tijd >= 12 && $tijd < 18) {
            $begroeting = "Goededag";
        } else {
            $begroeting = "Goedeavond";
        }
    ?>
    
    <?

        switch ($dagNummer) {
            case 1:
                $dag = "maandag";
                break;
            case 2:
                $dag = "dinsdag";
                break;
            case 3:
                $dag = "woensdag";
                break;
            case 4:
                $dag = "donderdag";
                break;
            case 5:
                $dag = "vrijdag";
                break;
            case 6:
                $dag = "zaterdag";
                break;
            case 7:
                $dag = "zondag";
                break;
            default:
                echo "";
                break;
        }
    ?>
    
    <?
    $datum = date('d/m/Y');
    ?>
    
    <?
        echo "$begroeting, we zijn vandaag $dag, $datum.";
    ?>

<h1>Oefening 2</h1>
<table>
<?php  
for ($x = 1; $x <= 10; $x+=1){
    echo "<tr><td>";
    $y = 6;
    $z = $x * $y;
    echo "$y x $x = $z";
    echo "</td></tr>";
}
?> 
</table>

<h1>Oefening 3</h1>
<table border="1">
<?php
    for ($x = 1; $x <=10; $x+=1){
        echo "<tr>";
        for ($y = 1; $y <=10; $y+=1){
                echo"<td>";
                echo $y * $x;
                echo"</td>";
            }
            echo"</tr>";
}
?>
</table>

<h1>Oefening 4</h1>
<?
        for($x=0;$x<=9;$x+=1) {
            for($y=0;$y<=9;$y+=1) {
                for($z=0;$z<=9;$z+=1) {
                    if ("$x$y$z"=="999") {
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