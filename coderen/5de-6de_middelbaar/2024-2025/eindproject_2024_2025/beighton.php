<?php
session_start();
include_once "../connect2db.inc";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Beighton Score Test - Hypermobiliteit Center</title>
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
            max-width: 800px;
            margin: auto;
            margin-bottom: 50px; /* ruimte onder het form */
        }
    </style>
</head>
<body>
    <?php include_once "header.inc"; ?>

    <div class="w3-container w3-padding-64 w3-center">
        <h1>Beighton Score Test</h1>
        <p>Beantwoord alle vragen hieronder om je hypermobiliteitsscore te berekenen.</p>
    </div>

    <div class="w3-container w3-padding w3-white w3-card w3-round text-section">
        <form method="POST" action="beighton_resultaat.php" class="w3-container">
            <?php
            $vragen = mysqli_query($conn, "SELECT * FROM beighton_questions");
            while ($vraag = mysqli_fetch_assoc($vragen)):
                $antwoorden = mysqli_query($conn, "SELECT * FROM beighton_answers WHERE vraag_id = " . $vraag['id']);
            ?>
                <p><strong><?php echo htmlspecialchars($vraag['vraag']); ?></strong></p>
                <?php while ($antwoord = mysqli_fetch_assoc($antwoorden)): ?>
                    <label class="w3-margin-right">
                        <input class="w3-radio" type="radio" name="vraag_<?php echo $vraag['id']; ?>" value="<?php echo $antwoord['waarde']; ?>" required>
                        <?php echo htmlspecialchars($antwoord['antwoord_text']); ?>
                    </label>
                <?php endwhile; ?>
                <hr>
            <?php endwhile; ?>
            <button type="submit" class="w3-button w3-indigo w3-round">Bereken score</button>
        </form>
    </div>

    <?php include_once "footer.inc"; ?>
</body>
</html>
