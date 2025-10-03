<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset = "UTF-8">
    <link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tasklist_css_map/tasklist1.css" type="text/css">
</head>

<body style="background-color:aliceblue">
    <?php include_once "../connect2db.inc"; ?>
    <header class ="w3-bar w3-large w3-teal">
        <span class ="w3-bar-item">Tasklist</span>
    </header>
    
    <br>
    <br>

    <div class="task_card w3-card-4">
        <div class="title_header-row">
            <h1 class="">Tasklist</h1>
            <a href="add_task.php" class="w3-bar-item w3-button w3-round-large w3-black w3-right">+</a>
        </div>
    
        <?php // -> de php-query om de gevegevens van de data base te halen. //
            $query = "SELECT * FROM tasklist";
            $taken = mysqli_query($conn, $query) or die ("Fout in SQL!");

            while ($taak = mysqli_fetch_array($taken)) {
                 $checked = $taak['finished'] ? 'checked' : '';
                $labelClass = $taak['finished'] ? 'done' : '';
        ?>

        <div class="checklist">
            <div class="checklist-styling checklist-structure" style="justify-content:space-between;">

                <div style = "display:flex; align-items:center; gap:8px;">
                    <input class="task-toggle" data-id="<?php echo $taak['id']; ?>"
                     <?php echo $checked; ?> type="checkbox"> 
                    <label class="<?php echo $labelClass; ?>"><?php echo $taak['title'];?></label>
                </div>

                <div style="display:flex; align-items:center; gap:12px;">
                    <p class="task-date <?php echo $labelClass; ?>"><?php echo $taak['date'];?></p>
                    <p><a href="edit_task.php?id=<?php echo $taak["id"]; ?>" class="w3-button w3-round-large w3-red">Edit</a></p>
                    <p><a href="delete_task.php?id=<?php echo $taak["id"]; ?>" class="w3-button w3-round-large w3-red">Delete</a></p>
                </div>

            </div>    
        </div>
            <?php
             }
            ?>
    </div>

    <footer class ="w3-bar w3-teal">
        <span class ="w3-bar-item">(c) 2024 by Ka-Huan Ng</span>
    </footer>
    
    <!-- Eerst jQuery halen-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Daarna je eigen script -->
    <script src="tasklist.js"></script>
</body>
</html>