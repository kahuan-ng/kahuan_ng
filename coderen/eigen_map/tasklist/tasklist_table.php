<!DOCTYPE html>
<html>
<head>
    <title>Voorbereiding</title>
    <meta charset = "UTF-8">
    <link rel = "stylesheet" href = "https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tasklist_css_map/tasklist_table.css" type="text/css">
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
        ?>

        <div class="checklist">
            <table class="w3-table w3-striped w3-border">
                <thead class="thead">
                    <tr class="w3-teal">
                        <th></th>
                        <th>Task</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        while ($taak = mysqli_fetch_array($taken)) {
                            $checked = $taak['finished'] ? 'checked' : '';
                            $labelClass = $taak['finished'] ? 'done' : '';
                    ?>


                        <tr class="clickable-row" data-url="edit_task.php?id=<?php echo $taak['id']; ?>">
                            <td><input class="task-toggle" data-id="<?php echo $taak['id']; ?>"<?php echo $checked; ?> type="checkbox"></td>
                            <td class="task <?php echo $labelClass; ?>"><?php echo $taak['title'];?></td>

                            <td class="task-date <?php echo $labelClass; ?>"><?php echo $taak['date'];?></td>
                            <td><a href="edit_task.php?id=<?php echo $taak["id"]; ?>" class="w3-button w3-round-large w3-green">📝</a></td>
                            <td><a href="delete_task.php?id=<?php echo $taak["id"]; ?>" class="w3-button w3-round-large w3-red">🗑️</a></td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


<footer class ="w3-bar w3-teal">
    <span class ="w3-bar-item">(c) 2024 by Ka-Huan Ng</span>
</footer>
    
    <!-- Eerst jQuery halen-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.task-toggle').on('change', function() {
                let checkbox = $(this);
                let taskId = checkbox.data('id');

                $.post('action_tasklist.php', { task_id: taskId }, function() {
                    // gebruik de tr als container
                    let row = checkbox.closest('tr');

                    // Titel td aanpassen
                    row.find('td').eq(1).toggleClass('done', checkbox.is(':checked'));

                    // Datum td aanpassen
                    row.find('td').eq(2).toggleClass('done', checkbox.is(':checked'));
                });
            });
        });
    </script>
</body>
</html>