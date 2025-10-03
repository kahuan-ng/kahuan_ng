<?php 
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Types of Hypermobility Syndromes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="homepagina.css">
    <link rel="stylesheet" href="header.css" type="text/css">


    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #e0f2f1;
            color: #333;
        }

        h1, h2, h3 {
            font-family: 'Open Sans', sans-serif;
            font-weight: 700;
            color: #3F51B5;
        }

        .text-section {
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.7;
        }

        .btn-accent {
            background-color: #7e57c2;
            color: white;
        }

        .btn-accent:hover {
            background-color: #5e35b1;
        }

        .text-primary {
            color: #1a237e;
        }

        .card-vibrant {
            border-left: 5px solid;
        }

        .card-eds { border-color: #ef5350; }
        .card-pxe { border-color: #ffca28; }
        .card-hsd { border-color: #26c6da; }
        .card-oi { border-color: #66bb6a; }
        .card-marfan { border-color: #ab47bc; }
        .card-stickler { border-color: #ec407a; }
    </style>
</head>
<body>
    <?php include_once "../connect2db.inc"; ?>
    <?php include_once "header.inc"; ?>
    
    <div class="w3-container w3-padding-64 w3-center">
        <h2 class="w3-xxlarge text-primary">Types of Hypermobility Syndromes</h2>
        <p class="w3-large w3-text-grey">These are the most common syndromes related to hypermobility:</p>
    </div>

    <div class="w3-row-padding w3-light-grey w3-padding-48">
        <div class="w3-container text-section">
<div class="w3-row-padding w3-center">
    <?php
        $query = "SELECT * FROM hypermobiliteit_variaties ORDER BY naam_variatie ASC;";
        $variaties = mysqli_query($conn, $query) or die("Fout in SQL!");

        $kleur_klassen = [
            "Ehlers-Danlos Syndromes" => "card-eds",
            "Pseudoxanthoma Elasticum" => "card-pxe",
            "HSD, JHS & hEDS" => "card-hsd",
            "Osteogenesis Imperfecta" => "card-oi",
            "Marfan Syndrome" => "card-marfan",
            "Stickler Syndrome" => "card-stickler"
        ];

        while ($variatie = mysqli_fetch_array($variaties)) {
            $naam = $variatie["naam_variatie"];
            $kleur_klasse = isset($kleur_klassen[$naam]) ? $kleur_klassen[$naam] : "";
    ?>
        <div class="w3-col l4 m6 s12 w3-margin-bottom">
            <div class="w3-card w3-white w3-padding-large card-vibrant <?php echo $kleur_klasse; ?>" style="min-height: 300px; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <h3 class="text-primary"><?php echo $naam; ?></h3>
                    <p><?php echo $variatie["beschrijving_variatie"]; ?></p>
                </div>
                <a href="variaties/<?php echo $naam; ?>.php" class="w3-button btn-accent w3-round-large w3-margin-top">More Information</a>
            </div>
        </div>
    <?php
        }
    ?>
</div>
        </div>
    </div>

    <?php include_once "footer.inc"; ?>
    <script src="script.js"></script>
</body>
</html>
