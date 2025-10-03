<?php
include_once "../connect2db.inc";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['task_id'])) {
    $id = intval($_POST['task_id']);

    $result = mysqli_query($conn, "SELECT finished FROM tasklist WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    $newValue = $row['finished'] ? 0 : 1;

    mysqli_query($conn, "UPDATE tasklist SET finished = $newValue WHERE id = $id");
}
?>