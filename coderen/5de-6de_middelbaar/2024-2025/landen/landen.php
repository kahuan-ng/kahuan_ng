<?php
    $url = "https://cdn.simplelocalize.io/public/v1/countries";
    $file = file_get_contents($url);
    $landen = json_decode($file);
    
        
        include_once("connect2db.inc");
        
        foreach ($landen as $land) {
            echo $land->name;
            
            $naam= mysqli_real_escape_string($conn, $land->name);
            $hoofdstad= mysqli_real_escape_string($conn, $land->capital_name);
            $code= mysqli_real_escape_string($conn, $land->code);

            $query="SELECT * from land where naam = '$naam';";
            $countries= mysqli_query($conn, $query) or die ("foutje: $query");
            $country = mysqli_fetch_array($countries);
            if (!$country) {

                $query="INSERT into land (naam, hoofdstad, code) VALUES
                    ('$naam', '$hoofdstad', '$code');";
                $country=mysqli_query($conn,$query) or die("foutje: $query");
            } else echo " bestaat al.";
            echo "<br>";
        }
        echo "done!<br>";
?>