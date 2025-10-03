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
    
    <!-- Externe stijlen -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Eigen stijlen -->
    <link rel="stylesheet" href="homepagina.css" type="text/css">
    <link rel="stylesheet" href="header.css" type="text/css">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #e0f2f1;
            color: #333;
        }
        h1, h2, h3 {
            font-weight: 700;
            color: #3F51B5;
        }
        .text-section {
            max-width: 1000px;
            margin: auto;
            line-height: 1.7;
        }
        .mission-heading {
            border-bottom: 2px solid #3F51B5;
            padding-bottom: 10px;
            display: inline-block;
        }
        .hypermobiel_img {
            width: 100%;
            height: auto;
        }
        ul.w3-ul {
            padding-left: 20px;
        }
    </style>
</head>

<body>
<?php include_once "header.inc"; ?>

<!-- Introductie -->
<div class="w3-container w3-padding-64 w3-center">
<h1 class="w3-xxlarge w3-responsive">Hypermobiliteit Center</h1>
    <h2 class="mission-heading">Wat is onze missie?</h2>
    <p class="w3-large w3-margin-top" style="color: #555;">
        Helping individuals with hypermobility achieve better health and quality of life.
    </p>
</div>

<!-- Introsectie over hypermobiliteit -->
<!-- Introsectie over hypermobiliteit -->
<div class="w3-row w3-padding-48 w3-light-grey">
    <div class="w3-container w3-padding text-section">

        <!-- Eerste blok: tekst links, afbeelding rechts -->
        <div class="w3-row-padding w3-margin-bottom">
            <div class="w3-col l6 m6 s12 w3-container">
                <h3><i class="fa fa-info-circle w3-margin-right"></i>Wat is Hypermobiliteit?</h3>
                <p>
                    Hypermobiliteit is een (erfelijke) aandoening van het bindweefsel. Door de andere samenstelling kunnen gewrichten verder buigen dan normaal, wat kan leiden tot overstrekking of instabiliteit.
                </p>
            </div>
            <div class="w3-col l6 m6 s12 w3-container">
                <img src="hypermobiel_duim.png" class="hypermobiel_img" alt="Hypermobiele duim">
            </div>
        </div>

        <!-- Tweede blok: afbeelding links, tekst rechts -->
        <div class="w3-row-padding w3-margin-bottom">
            <div class="w3-col l6 m6 s12 w3-container">
                <img src="hypermobiel_yoga.png" class="hypermobiel_img" alt="Hypermobiele yoga">
            </div>
            <div class="w3-col l6 m6 s12 w3-container">
                <h3><i class="fa fa-users w3-margin-left"></i>Onze aanpak</h3>
                <p>
                    Nunc non risus et libero congue laoreet. Nullam egestas nisl turpis, ut cursus diam ullamcorper et. Suspendisse eget nisl vitae eros tristique blandit.
                </p>
            </div>
        </div>

        <!-- Rest blijft zoals hij was -->
        <h3><i class="fa fa-eye w3-margin-right"></i>Hoe herken je hypermobiliteit?</h3>
        <ul class="w3-ul">
            <li>Overstrekken van gewrichten</li>
            <li>Hoge flexibiliteit</li>
            <li>Snel overbelast na beweging</li>
            <li>Regelmatige spierpijn of verstuikingen</li>
            <li>Instabiele gewrichten</li>
            <li>Onverklaarbare klachten zoals rug- of bekkenpijn</li>
        </ul>

        <h3><i class="fa fa-lightbulb-o w3-margin-right"></i>Oorzaken</h3>
        <p>
            Vaak erfelijk. Soms onderdeel van HSD of hEDS (Ehlers-Danlos Syndroom, hypermobiel type).
        </p>

        <h3><i class="fa fa-stethoscope w3-margin-right"></i>Diagnose</h3>
        <p>
            Meestal met de Beighton-score (9-punten test), samen met medische voorgeschiedenis en observatie.
        </p>

        <h3><i class="fa fa-exclamation-triangle w3-margin-right"></i>Mogelijke gevolgen</h3>
        <ul class="w3-ul">
            <li>Chronische pijn</li>
            <li>Verlies van balans of houdingscontrole</li>
            <li>Sneller blessures</li>
            <li>Angst om te bewegen</li>
        </ul>

        <h3><i class="fa fa-heart w3-margin-right"></i>Behandeling en ondersteuning</h3>
        <ul class="w3-ul">
            <li>Fysiotherapie en oefentherapie</li>
            <li>Pijnmanagement</li>
            <li>Begeleiding door specialisten</li>
        </ul>
        <p>
            Goed leren omgaan met je lichaam is cruciaal. Luister naar je grenzen, rust uit, en bouw conditie op.
        </p>

        <h3><i class="fa fa-life-ring w3-margin-right"></i>In het dagelijks leven</h3>
        <p>
            Sommigen ervaren geen hinder en benutten hun flexibiliteit. Anderen hebben juist begeleiding nodig.
        </p>

        <p>
            Wil je weten of jij hypermobiel bent? Doe de <a href="beighton.php" class="w3-text-indigo"><strong>Beighton-score test</strong></a>.
        </p>
    </div>
</div>

<!-- Verhalen oproep -->
<div class="w3-container w3-center w3-padding-64">
    <h3>Voel je je alleen?</h3>
    <p>Lees de verhalen van andere inspirerende mensen.</p>
    <a href="delen_verhalen.php" class="w3-button w3-indigo w3-round-large w3-hover-dark-grey w3-padding-large w3-margin-top">Verhalen <i class="fa fa-arrow-right w3-margin-left"></i></a>
</div>

<?php include_once "footer.inc"; ?>
</body>
</html>