<?php
session_start();
include_once "../connect2db.inc"; // Zorg dat dit pad klopt en $conn definieert

if (!isset($_SESSION["user_identifier"])) {
    header("Location: aanmelden.php");
    exit();
}

// Bepaal of admin een andere gebruiker bekijkt via URL (bijv. ?id=5)
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $user_id_to_view = (int)$_GET["id"];
} else {
    $user_id_to_view = (int)$_SESSION["user_identifier"];
}

// 1. Haal de Beighton testresultaten op voor de gekozen gebruiker
$stmt_beighton = $conn->prepare("SELECT score, advies, test_datum FROM beighton_user_results WHERE user_identifier = ? ORDER BY test_datum DESC");
$stmt_beighton->bind_param("i", $user_id_to_view);
$stmt_beighton->execute();
$result_beighton = $stmt_beighton->get_result();
$stmt_beighton->close();

// 2. Haal de gebruikersgegevens op voor de "Terug" link
$gebruiker_data = null;
$stmt_gebruiker = $conn->prepare("SELECT id FROM gebruikers WHERE id = ? LIMIT 1");
if ($stmt_gebruiker) {
    $stmt_gebruiker->bind_param("i", $user_id_to_view);
    $stmt_gebruiker->execute();
    $result_gebruiker = $stmt_gebruiker->get_result();
    $gebruiker_data = $result_gebruiker->fetch_assoc();
    $stmt_gebruiker->close();
} else {
    error_log("Error preparing statement for gebruikers table: " . $conn->error);
}

// 3. Controleer of de gebruiker bestaat
if (!$gebruiker_data || !isset($gebruiker_data['id'])) {
    session_destroy();
    header("Location: aanmelden.php?error=invalid_user");
    exit();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <title>Beighton Testresultaten</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="header.css" type="text/css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #e0f2f1;
            color: #333;
        }
        h1, h2 {
            color: #3F51B5;
        }
        .text-section {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }
        .test-entry {
            border-bottom: 1px solid #ccc;
            padding: 15px 0;
        }
        .test-entry:last-child {
            border-bottom: none;
        }
        .test-date {
            font-weight: 600;
            color: #555;
        }
        .test-score {
            font-size: 1.4em;
            color: #3F51B5;
            margin: 5px 0;
        }
        .test-advies {
            white-space: pre-wrap;
            color: #222;
        }
    </style>
</head>
<body>
<?php include_once "header.inc"; ?>
    <div class="w3-container text-section">

        <h1>Beighton Testresultaten</h1>

        <?php if ($result_beighton->num_rows === 0): ?>
            <p>Geen testresultaten gevonden voor deze gebruiker.</p>
        <?php else: ?>
            <?php while ($row = $result_beighton->fetch_assoc()): ?>
                <div class="test-entry">
                    <div class="test-date"><?php echo date("d-m-Y H:i", strtotime($row['test_datum'])); ?></div>
                    <div class="test-score">Score: <?php echo htmlspecialchars($row['score']); ?></div>
                    <div class="test-advies"><?php echo nl2br(htmlspecialchars($row['advies'])); ?></div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        <div class="w3-padding w3-center">
            <a href="edit_admin_registratie.php?id=<?php echo htmlspecialchars($gebruiker_data['id']); ?>" class="w3-button w3-light-grey w3-round w3-margin-bottom">Terug</a>
        </div>
    </div>
<?php include_once "footer.inc"; ?>
</body>
</html>