<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Eindproject - Hypermobiliteit Center</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="homepagina.css" type="text/css">

    <style>
        /* Basic custom styling to complement W3.CSS */
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #e0f2f1; /* Light teal background */
            color: #333; /* Darker grey for body text */
        }
        h1, h2, h3 {
            font-family: 'Open Sans', sans-serif;
            font-weight: 700;
            color: #3F51B5; /* Indigo for headings */
        }
        .text-section {
            max-width: 1000px; /* Limit text width for readability */
            margin-left: auto;
            margin-right: auto;
            line-height: 1.7; /* Improved line height */
        }
        .mission-heading {
            border-bottom: 2px solid #3F51B5; /* Underline effect for mission */
            padding-bottom: 10px;
            display: inline-block; /* To make border-bottom only as wide as text */
        }
        
        .hypermobiel_duim {
            width: 100%;
            height: 100%;
            align-items: stretch; /* This makes flex items (your w3-half divs) stretch to the height of the tallest item */
        }

    </style>
</head>

<body>
    <?php include_once "header.inc"; ?>

    <div class="w3-container w3-padding-64 w3-center">
        <h1 class="w3-jumbo">Hypermobiliteit Center</h1>
        <h2 class="w3-text-indigo mission-heading">Wat is onze missie?</h2>
        <p class="w3-large w3-margin-top" style="color: #555;">
            Helping individuals with hypermobility achieve better health and quality of life.
            </p>
    </div>

    <div class="w3-row w3-padding-48 w3-light-grey">
        <div class="w3-container w3-padding text-section">
            
            <div class="w3-row-padding w3-margin-bottom" style = "display: flex;">
                <div class="w3-half w3-container">
                    <h3><i class="fa fa-info-circle w3-margin-right"></i>Understanding Hypermobility</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In laoreet mauris sollicitudin, pellentesque nibh in, aliquam nisl. Sed ultrices dui a leo convallis ullamcorper. Curabitur tempor et tellus nec lacinia. Proin eu justo auctor massa fermentum pretium at eu metus. Integer a interdum tortor. Morbi sed cursus lorem. Sed euismod sed sapien sed scelerisque.
                        </p>
                </div>
                
                <div class="w3-half w3-container" style="display: flex;">
                    <img src="hypermobiel_duim.png" class="hypermobiel_duim">
                </div>
            </div>
            
            <div class="w3-row-padding w3-margin-top" style="display: flex;">
                <div class="w3-half w3-container" style="display: flex;">
                    <img src="hypermobiel_yoga.png" class="hypermobiel_duim">
                </div>

                <div class= "w3-half w3-container">
                    <h3><i class="fa fa-users w3-margin-left"></i>Our Approach</h3>
                        <p>Nunc non risus et libero congue laoreet. Nullam egestas nisl turpis, ut cursus diam ullamcorper et. Suspendisse eget nisl vitae eros tristique blandit tempus sed purus. Nullam ornare tempus sapien ut aliquam. Duis ut lobortis nisi, ut sodales nibh. Pellentesque egestas laoreet enim, id bibendum est elementum nec. Proin hendrerit mi vitae velit accumsan fringilla. Aliquam finibus massa id ex gravida tincidunt. Nunc luctus pharetra nunc sed dapibus.
                        </p>
                </div>
            </div>
            
        </div>
    </div>

    <div class="w3-container w3-center w3-padding-64">
        <h3>Do you feel alone?</h3>
        <p>Go read the stories of the inspiring people.</p>
        <a href="delen_verhalen.php" class="w3-button w3-indigo w3-round-large w3-hover-dark-grey w3-padding-large w3-margin-top">Stories <i class="fa fa-arrow-right w3-margin-left"></i></a>
    </div>

    <?php include_once "footer.inc"; ?>
</body>
</html>