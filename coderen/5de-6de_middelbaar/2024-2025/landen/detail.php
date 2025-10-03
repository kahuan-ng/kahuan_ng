<?php
include("../connect2db.inc");

// Controleer of er een code is doorgegeven
if (isset($_GET['code']) && !empty($_GET['code'])) {
    $code = mysqli_real_escape_string($conn, $_GET['code']);
    $query = "SELECT * FROM land WHERE code = '$code'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $land = mysqli_fetch_assoc($result);
    } else {
        die("Land niet gevonden.");
    }
} else {
    die("Geen landcode opgegeven.");
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detailpagina - <?php echo $land['naam']; ?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-container w3-teal">
        <h2><?php echo $land['naam']; ?> - Details</h2>
    </div>
    <div class="w3-container">
        <p><strong>Naam:</strong> <?php echo $land['naam']; ?></p>
        <p><strong>Hoofdstad:</strong> <?php echo $land['hoofdstad']; ?></p>
        <p><strong>Code:</strong> <?php echo $land['code']; ?></p>
        <p><strong>Vlag:</strong></p>
        <img src="https://flagcdn.com/w640/<?php echo strtolower($land['code']); ?>.png" alt="Vlag van <?php echo $land['naam']; ?>" style="width:200px;">
        <br><br>
        <a href="landendb_2.php" class="w3-button w3-teal">Terug naar overzicht</a>
    </div>
</body>
</html>
