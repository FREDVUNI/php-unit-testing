<?php
    require_once __DIR__ . '/database.php';
    $id = $_GET["id"];
    $sql = "DELETE FROM tasks WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        // header("Location: ./index.php");
        echo "yes";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
?>
