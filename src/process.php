<?php
require_once __DIR__ . '/database.php';

if (isset($_POST['task']) && isset($_POST['submit'])) {
    $task = $_POST['task'];
    error_log("New task " . $task);
    $stmt = $conn->prepare("INSERT INTO tasks (task) VALUES (?)");
    $stmt->bind_param("s", $task);
    $stmt->execute();
    $stmt->close();
    // header("Location: ./index.php");
}
?>
