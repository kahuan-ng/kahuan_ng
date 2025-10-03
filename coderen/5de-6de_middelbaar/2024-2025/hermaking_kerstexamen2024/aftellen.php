<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Aftellen</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-margin-0" style="height: 100vh;">

    <!-- Full-screen background image -->
    <img src="acties.png" alt="Full Screen" style="width:100%; height:100%; object-fit:cover;">

    <a href="homepagina.php" style="position: absolute; top: 10px; left: 10px;">
        <img src="logo.png" alt="logo" style="width:240px; height:126px;">
    </a>

    <!-- "COMING SOON" text -->
    <div class="w3-center w3-xxlarge w3-text-white" style="position: absolute; top: 40%; left: 50%; transform: translate(-50%, -50%);">
        COMING SOON
    </div>
    
    <!-- White line between the two texts -->
    <svg width="100%" height="2" style="position: absolute; top: 48%; left: 50%; transform: translateX(-50%); xmlns="http://www.w3.org/2000/svg"">
        <line x1="500" y1="50" x2="450" y2="50" style="stroke:white; stroke-width:4" />
    </svg>

    <div class="w3-container w3-border" style="position: absolute; top: 40%; left: 50%; transform: translate(-50%, -50%);">
    </div>

    <!-- Countdown timer -->
    <div class="w3-center w3-xlarge w3-text-white" id="timer" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    </div>

    <!-- "De Warmste Week" text in the left corner -->
    <h2 class="w3-text-white w3-padding" style="position: absolute; bottom: 0; left: 0; margin: 10px;">
        De Warmste Week
    </h2>
    
    <script src="script.js"></script>
</body>
</html>
