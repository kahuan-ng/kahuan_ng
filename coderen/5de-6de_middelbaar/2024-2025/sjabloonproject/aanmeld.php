<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0"?>
    <link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
<?php include_once "../connect2db.inc"; ?>
    <?php
        $id=$_GET["id"];
        $query="select * from gebruikers where id = $id;";
        $gebruikers=mysqli_query($conn,$query) or die("fout in sql!");
        $gebruiker=mysqli_fetch_array($gebruikers);
    ?>
    <header class ="w3-bar w3-large w3-top w3-teal">
        <span class ="w3-bar-item">De Header</span>
        <input class="w3-button w3-light-gray" type="button" value='<?php echo $_GET["id"]; ?>' onclick="window.location.href='edit_registratie.php?id=<?php echo $_GET["id"]; ?>'">
    </header>
    
    <footer class ="w3-bar w3-bottom w3-teal">
        <span class ="w3-bar-item">(c) 2024 by Ka-Huan Ng</span>
    </footer>
    
    <script src="script_login.js"></script>
</body>
</html>