<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="tasklist_css_map/add_task.css" type="text/css">
</head>

<body>
<?php include_once "../connect2db.inc"; ?>
    <header class ="w3-bar w3-teal ">
        <span class ="w3-bar-item">Add taak</span>
    </header>

    <br>
    <br>

    <div class="task_card w3-card-4 w3-white w3-margin">
        <div class="title_header-row w3-container" style="background-color: #2e4a4e; color: white;">
            <h2>Voeg dag toe</h2>
        </div>

        <!-- Verhaal Formulier -->
        <form class="w3-padding" method="post" action="save_task.php">
            <div class= "w3-padding">
                <label><b>Title</b></label>
                    <input class ="w3-input w3-border" type="text" name="frmTitle" id="frmTitle">
            </div>

            <div class= "w3-padding">
                <label><b>Description</b></label>
                    <textarea class ="w3-input w3-border" type="text" name="frmDescription" id="frmDescription" rows="5"></textarea>
            </div>

            
            <div class="w3-row w3-padding" style="align-items: baseline; margin-top: 6px;">
                <input id="submit-button" class="w3-button w3-left w3-round-large w3-teal" type="submit" value="submit"></input>
                <a href="tasklist.php" id="terug-button" class="w3-button w3-right w3-round-large w3-margin-bottom w3-teal">Terug</a>
            </div>

        </form>
    </div> 
       
    <footer class ="w3-bar w3-bottom w3-teal">
        <span class ="w3-bar-item">(c) 2024 by Ka-Huan Ng</span>
    </footer>
    
    <script src="script.js"></script>
</body>
</html>