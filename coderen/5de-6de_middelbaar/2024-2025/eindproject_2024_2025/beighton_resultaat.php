<?php
session_start();
include_once "../connect2db.inc";

$error = null;
$score = null;
$advies = null;

if (!isset($_SESSION['user_identifier'])) {
    header("Location: aanmelden.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vragen = mysqli_query($conn, "SELECT * FROM beighton_questions");
    $total_score = 0;
    $valid = true;

    while ($vraag = mysqli_fetch_assoc($vragen)) {
        $key = 'vraag_' . $vraag['id'];
        if (!isset($_POST[$key])) {
            $valid = false;
            $error = "Je moet alle vragen beantwoorden.";
            break;
        }
        $antwoord_waarde = (int)$_POST[$key];
        $total_score += $antwoord_waarde;
    }

    if ($valid) {
        $score = $total_score;
        $result_advies = mysqli_query($conn, "SELECT advies FROM beighton_results WHERE min_score <= $score AND max_score >= $score LIMIT 1");
        if ($result_advies && mysqli_num_rows($result_advies) > 0) {
            $row = mysqli_fetch_assoc($result_advies);
            $advies = $row['advies'];
        } else {
            $advies = "Geen passend advies gevonden voor je score.";
        }

        // Resultaat opslaan in database
        $user_identifier = $_SESSION['user_identifier'];
        $stmt = $conn->prepare("INSERT INTO beighton_user_results (user_identifier, score, advies, test_datum) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("sis", $user_identifier, $score, $advies);
        $stmt->execute();
    }
} else {
    $error = "Ongeldige toegang.";
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Beighton Score Resultaat - Hypermobiliteit Center</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="header.css" type="text/css">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #e0f2f1;
            color: #333;
        }
        h1, h2 {
            font-weight: 700;
            color: #3F51B5;
        }
        .text-section {
            max-width: 700px;
            margin: auto;
            padding: 40px;
            background: white;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <?php include_once "header.inc"; ?>

    <div class="w3-container w3-padding-64 w3-center">
        <h1>Beighton Score Resultaat</h1>
    </div>

    <div class="w3-container text-section w3-card">
        <?php if ($error): ?>
            <div class="w3-panel w3-red w3-round"><?php echo htmlspecialchars($error); ?></div>
            <a href="beighton.php" class="w3-button w3-indigo w3-round">Terug naar test</a>
        <?php else: ?>
            <h2>Je score is: <?php echo $score; ?></h2>
            <p><?php echo nl2br(htmlspecialchars($advies)); ?></p>
            <a href="beighton.php" class="w3-button w3-indigo w3-round">Opnieuw testen</a>
            <a href="beighton_resultaat_overzicht.php" class="w3-button w3-light-grey w3-round">Bekijk je resultaten</a>
        <?php endif; ?>
    </div>

    <?php include_once "footer.inc"; ?>
</body>
</html>