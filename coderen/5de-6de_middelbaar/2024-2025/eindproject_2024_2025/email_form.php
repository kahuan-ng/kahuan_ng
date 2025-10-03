<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0"?>
    <link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
<!--    <header class ="w3-bar w3-large w3-top w3-teal">
        <span class ="w3-bar-item">De Header</span>
    </header>
-->    
    <form method = "post" action="send_email.php">
        <label for = "frmNaam">Name</label>
        <input type="text" name="frmNaam" id="frmNaam" required>
        
        <label for = "frmEmailadres">Email</label>
        <input type="email" name="frmEmailadres" id="frmEmailadres" required>
        
        <label for = "subject">subject</label>
        <input type="text" name="subject" id="subject" required>
        
        <label for = "message">Message</label>
        <textarea name="message" id="message" required></textarea>
        
        <br>
        <button>Send</button>
    </form>
    
    <footer class ="w3-bar w3-bottom w3-teal">
        <span class ="w3-bar-item">(c) 2024 by Ka-Huan Ng</span>
    </footer>
    
<script src="script.js"></script>
</body>
</html>