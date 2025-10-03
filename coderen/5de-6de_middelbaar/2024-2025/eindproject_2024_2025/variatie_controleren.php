<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Variatiebeheer - Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- W3.CSS & Fonts -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="header.css" type="text/css">


    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #e0f2f1;
            color: #333;
        }

        h2 {
            color: #3F51B5;
            font-weight: 700;
            padding-top: 32px;
            padding-bottom: 16px;
            text-align: center;
        }

        .btn-accent {
            background-color: #7e57c2;
            color: white;
        }
        .btn-accent:hover {
            background-color: #5e35b1;
        }

        table.w3-table {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            margin: 32px auto;
            max-width: 900px;
        }

        th {
            background-color: #3F51B5 !important;
            color: white !important;
            padding: 12px !important;
        }

        td {
            padding: 12px !important;
            vertical-align: middle;
        }

        .w3-button.w3-black {
            border-radius: 8px;
        }

        .button-container {
            text-align: center;
            margin: 24px 0;
        }
    </style>
</head>
<body>
<?php include_once "../connect2db.inc"; ?>
<?php include_once "header.inc"; ?>

<h2>Variatiebeheer</h2>

<div class="button-container">
    <button class="w3-button btn-accent w3-round-large" onclick="window.location.href='add_variatie.php'">Variatie toevoegen</button>
    <button class="w3-button btn-accent w3-round-large" onclick="window.location.href='admin.php'">Admin</button>
</div>


<?php if (isset($_GET['status']) && $_GET['status'] === 'verwijderd'): ?>
    <div class="w3-panel w3-green w3-center" style="max-width: 900px; margin: auto;">
        <p>Variatie succesvol verwijderd.</p>
    </div>
<?php endif; ?>

<div class="w3-container" style="max-width: 900px; margin: auto;">
    <table class="w3-table w3-bordered w3-striped w3-card-4">
        <thead>
            <tr>
                <th>Variatie</th>
                <th>Beschrijving</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM hypermobiliteit_variaties");

            while ($row = $result->fetch_assoc()):
            ?>
                <tr>
                    <td><?= htmlspecialchars($row['naam_variatie']) ?></td>
                    <td><?= htmlspecialchars($row['beschrijving_variatie']) ?></td>
                    <td>
                        <form method="post" action="delete_variatie.php" style="display:inline;" onsubmit="return confirm('Weet je zeker dat je deze variatie wilt verwijderen?');">
                            <input type="hidden" name="frmID" value="<?= $row['id'] ?>">
                            <button class="w3-button w3-black w3-round-large" type="submit">Verwijder</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include_once "footer.inc"; ?>
</body>
</html>
