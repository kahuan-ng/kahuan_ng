<header class="w3-bar w3-padding">
    <div class="logo-container w3-bar-item">
        <a href="index.php">
            <img src="hypermobility_logo.png" alt="Hypermobility Central Logo" class="logo-img">
        </a>
    </div>

    <nav>
        <a href="variaties.php">Variaties</a>
        <a href="delen_verhalen.php">Verhalen</a>
        <a href="beighton.php">Beightonscore test</a>
    </nav>

    <div class="login-buttons">
        <?php
        if (isset($_SESSION['gebruiker_id']) && isset($_SESSION['gebruiker'])) {
            $gebruiker_naam = htmlspecialchars($_SESSION['gebruiker']);
            echo '<a href="edit_registratie.php?id=' . $_SESSION["gebruiker_id"] . '" class="gebruiker">' 
                . $gebruiker_naam . '</a>';
            echo '<a href="logout.php" class="logout">Logout</a>';
        } else {
            echo '<a href="registreren.php" class="registratie">Registratie</a>';
            echo '<a href="aanmelden.php" class="login">Login</a>';
        }
        ?>
    </div>
</header>