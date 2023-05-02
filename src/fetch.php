<?php
  require_once __DIR__ . '/database.php';

  $sql = "SELECT id,task FROM tasks";
  $result = $conn->query($sql);
  $rows = array();
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $rows[] = $row;
      }
  }
  
  $output = json_encode($rows);
  echo $output;
  
  $conn->close();
  
?>
