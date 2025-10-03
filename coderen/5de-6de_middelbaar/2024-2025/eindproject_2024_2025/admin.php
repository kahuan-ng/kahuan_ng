<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Gebruikersbeheer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- W3.CSS & Fonts -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Icons & Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            text-align: center;
            padding-top: 32px;
            padding-bottom: 16px;
        }

        .btn-accent {
            background-color: #7e57c2;
            color: white;
            transition: background-color 0.3s ease;
        }
        .btn-accent:hover {
            background-color: #5e35b1;
            cursor: pointer;
        }

        table.w3-table {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            max-width: 900px;
            margin: 24px auto;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        th {
            background-color: #3F51B5 !important;
            color: white !important;
            padding: 12px !important;
            text-align: left;
        }

        td {
            padding: 12px !important;
            vertical-align: middle;
        }

        /* Knoppen */
        .btn-admin {
            margin-right: 8px;
        }
        .w3-button.w3-round-large {
            border-radius: 8px;
            padding: 8px 14px !important;
            font-weight: 600;
        }

        .footer {
            width: 100%;
            background-color: #2E4A4F;
            color: #E7FFF9;
            padding: 16px 0;
            box-shadow: 0 -2px 6px rgba(0,0,0,0.15);
        }

        .footer h3 {
            margin-bottom: 8px;
        }

        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .label-self {
            color: #757575;
            font-size: 0.85rem;
            margin-left: 12px;
        }

        @media (max-width: 600px) {
            .action-buttons {
                flex-direction: column;
                align-items: flex-start;
            }
            .btn-admin {
                margin-bottom: 8px;
                margin-right: 0;
            }
        }
    </style>
</head>
<body>

    <?php include_once "../connect2db.inc"; ?>
    <?php include_once "header.inc"; ?>

    <h2>Gebruikersbeheer</h2>

    <div class="w3-container w3-center" style="margin-bottom: 24px;">
        <button class="w3-button w3-round-large btn-accent" onclick="window.location.href='variatie_controleren.php'">Variatiebeheer</button>
    </div>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'verwijderd'): ?>
        <div class="w3-panel w3-green w3-center" style="max-width: 900px; margin: auto;">
            <p>Gebruiker succesvol verwijderd.</p>
        </div>
    <?php endif; ?>

    <div class="w3-container" style="max-width: 900px; margin: auto;">
        <table class="w3-table w3-bordered w3-striped w3-card-4">
            <thead>
                <tr>
                    <th>Gebruikersnaam</th>
                    <th>Rechten</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT id, gebruikersnaam, rechten FROM gebruikers");

                while ($row = $result->fetch_assoc()):
                    $isEigenAccount = isset($_SESSION['gebruiker_id']) && $_SESSION['gebruiker_id'] == $row['id'];
                ?>
                <tr>
                    <td>
                        <a href="edit_admin_registratie.php?id=<?= $row["id"] ?>" class="w3-text-blue">
                            <?= htmlspecialchars($row['gebruikersnaam']) ?>
                        </a>
                    </td>
                    <td><?= htmlspecialchars($row['rechten']) ?></td>
                    <td>
                        <div class="action-buttons">
                            <form method="post" action="update_rechten.php" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="hidden" name="nieuwe_rechten" value="<?= $row['rechten'] === 'admin' ? 'gebruiker' : 'admin' ?>">
                                <button class="w3-button w3-round-large btn-admin <?= $row['rechten'] === 'admin' ? 'w3-red' : 'w3-green' ?>" type="submit">
                                    <?= $row['rechten'] === 'admin' ? 'Verwijder Admin' : 'Maak Admin' ?>
                                </button>
                            </form>

                            <form method="post" action="verwijder_gebruiker.php" style="display:inline;" onsubmit="return confirm('Weet je zeker dat je deze gebruiker en al hun data wilt verwijderen?');">
                                <input type="hidden" name="frmID" value="<?= $row['id'] ?>">
                                <button class="w3-button w3-black w3-round-large" type="submit">Verwijder</button>
                            </form>

                            <?php if ($isEigenAccount): ?>
                                <span class="label-self" style = "color: #7e57c2;">Jezelf</span>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

<?php include_once "footer.inc"; ?>
</body>
</html>