<?php
    require_once __DIR__ . '/database.php';
    $id = $_POST["id"];
    $task = $_POST["task"];
    $sql = "UPDATE tasks SET task='$task' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Task has been updated.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
?>
