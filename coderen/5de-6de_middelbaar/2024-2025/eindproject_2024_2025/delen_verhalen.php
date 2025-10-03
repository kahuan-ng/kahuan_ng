<?php
session_start();
include_once "../connect2db.inc";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verhalen delen</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="header.css" type="text/css">

</head>
<body style="background-color: #e0f2f1;">
    <?php include_once "header.inc"; ?>

    <div class="w3-content w3-padding" style="max-width:800px;">

        <h2 class="w3-center w3-text-indigo">Gedeelde Verhalen</h2>

        <div class="w3-center w3-margin-bottom">
            <?php if (isset($_SESSION['gebruikersnaam'])): ?>
                <a href="add_verhaal.php" class="w3-button w3-round-large w3-round" style="color:white; background-color: #7e57c2;">
                    Nieuw verhaal toevoegen
                </a>
            <?php else: ?>
                <a href="aanmelden.php" class="w3-button w3-round-large w3-round" style="color:white; background-color: #7e57c2;">
                    Log in om een verhaal te delen
                </a>
            <?php endif; ?>
        </div>

        <?php
        $sql = "SELECT * FROM verhalen ORDER BY datum DESC";
        $result = mysqli_query($conn, $sql);

        while ($verhaal = mysqli_fetch_array($result)) :
            $verhaal_id = $verhaal['id'];
        ?>
            <div class="w3-card-4 w3-white w3-margin-bottom w3-padding">
                <h3 class="w3-text-indigo"><?php echo htmlspecialchars($verhaal['onderwerp']); ?></h3>
                <p class="w3-text-black">
                    Door: <strong>
                        <?php 
                            echo htmlspecialchars($verhaal['naam_verhaal']); 
                            if (isset($_SESSION['gebruikersnaam'], $_SESSION['rechten']) && 
                                $verhaal['naam_verhaal'] === $_SESSION['gebruikersnaam'] && 
                                $_SESSION['rechten'] === 'admin') {
                                echo " (admin)";
                            }
                        ?>
                    </strong>
                </p>
                <span class="w3-small w3-text-grey">(<?php echo date('d/m/Y H:i', strtotime($verhaal['datum'])); ?>)</span>
                <p class="w3-container w3-light-grey w3-round w3-padding"><?php echo nl2br(htmlspecialchars($verhaal['verhaal'])); ?></p>

                <!-- Reacties tonen -->
                <div class="w3-container w3-light-grey w3-padding w3-margin-top w3-round">
                    <h4>Reacties:</h4>
                    <?php
                    $comment_query = "SELECT * FROM verhalen_comment WHERE id_verhaal = $verhaal_id ORDER BY datum_comment DESC";
                    $comments = mysqli_query($conn, $comment_query);
                    
                    if (mysqli_num_rows($comments) > 0) {
                        while ($comment = mysqli_fetch_array($comments)) {
                            echo '<div class="w3-padding w3-white w3-margin-bottom w3-round">';
                            echo '<div style="display: flex; justify-content: space-between; align-items: center;">';

                            echo '<p style="margin:0;"><strong>' . htmlspecialchars($comment['naam_comment']);
                            if (isset($_SESSION['gebruikersnaam'], $_SESSION['rechten']) && 
                                $comment['naam_comment'] === $_SESSION['gebruikersnaam'] && 
                                $_SESSION['rechten'] === 'admin') {
                                echo " (admin)";
                            }
                            echo '</strong> ';
                            echo '<span class="w3-small w3-text-grey">(' . date('d/m/Y H:i', strtotime($comment['datum_comment'])) . ')</span></p>';

                            if (isset($_SESSION['gebruikersnaam']) && (
                                $_SESSION['gebruikersnaam'] === $comment['naam_comment'] ||
                                $_SESSION['rechten'] === 'admin'
                            )) {
                                echo '<form action="delete_verhaal_comment.php" method="POST" style="margin:0;" onsubmit="return confirm(\'Weet je zeker dat je deze reactie wilt verwijderen?\');">';
                                echo '<input type="hidden" name="id_comment" value="' . $comment['id_comment'] . '">';
                                echo '<button type="submit" class="w3-button w3-red w3-small w3-round">-</button>';
                                echo '</form>';
                            }

                            echo '</div>';
                            echo '<p style="margin-top: 15px;">' . nl2br(htmlspecialchars($comment['comment'])) . '</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>Er zijn nog geen reacties.</p>';
                    }
                    ?>
                </div>

                <!-- Knoppen container -->
                <div class="w3-margin-top" style="display: flex; justify-content: space-between; align-items: center;">
                    <?php if (isset($_SESSION['gebruikersnaam'])): ?>
                        <button class="w3-button w3-round-large w3-indigo w3-small" onclick="toggleForm(<?php echo $verhaal_id; ?>)">Reageer</button>
                    <?php else: ?>
                        <a href="aanmelden.php" class="w3-button w3-round-large w3-red w3-small">Log in om te reageren</a>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['gebruikersnaam']) && (
                        $_SESSION['gebruikersnaam'] === $verhaal['naam_verhaal'] ||
                        $_SESSION['rechten'] === 'admin')): ?>
                        <form action="delete_verhaal.php" method="POST" style="display:inline-block; margin:0;" onsubmit="return confirm('Weet je zeker dat je dit verhaal wilt verwijderen?');">
                            <input type="hidden" name="verhaal_id" value="<?php echo $verhaal_id; ?>">
                            <button type="submit" class="w3-button w3-red w3-small w3-round">-</button>
                        </form>
                    <?php endif; ?>
                </div>

                <!-- Reactieformulier -->
                <?php if (isset($_SESSION['gebruikersnaam'])): ?>
                    <div id="form-<?php echo $verhaal_id; ?>" class="w3-margin-top w3-hide">
                        <form action="save_verhalen_comment.php" method="POST" class="w3-container w3-border w3-padding w3-white w3-round">
                            <input type="hidden" name="verhaal_id" value="<?php echo $verhaal_id; ?>">
                            <input type="hidden" name="naam" value="<?php echo htmlspecialchars($_SESSION['gebruikersnaam']); ?>">
                            <p class="w3-small w3-text-grey">Door: <strong><?php echo htmlspecialchars($_SESSION['gebruikersnaam']); ?></strong></p>

                            <label for="comment">Reactie:</label>
                            <textarea class="w3-input w3-margin-bottom" name="comment" rows="2" required></textarea>

                            <button class="w3-button w3-indigo w3-round" type="submit">Plaats reactie</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>

    <?php include_once "footer.inc"; ?>

    <script>
    function toggleForm(id) {
        const form = document.getElementById("form-" + id);
        form.classList.toggle("w3-hide");
    }
    </script>

</body>
</html>
