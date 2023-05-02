<?php
    require_once __DIR__ . '/database.php';
    $id = $_GET["id"]; 
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $todo_item = $row['task'];
    } else {
      $todo_item = "";
    }
    
    $stmt->close();
    $conn->close();

?>
