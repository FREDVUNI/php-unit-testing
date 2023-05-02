<?php

use PHPUnit\Framework\TestCase;

class UpdateTaskTest extends TestCase
{
    private $conn;

    protected function setUp(): void
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tasks_todo_tests";

        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        $sql = "TRUNCATE TABLE tasks";
        if ($this->conn->query($sql) === FALSE) {
            die("Error truncating tasks table: " . $this->conn->error);
        }
    }

    public function testUpdateTask()
    {
        $sql = "INSERT INTO tasks (task) VALUES ('task one')";
        if ($this->conn->query($sql) === FALSE) {
            die("Error inserting test task: " . $this->conn->error);
        }
    
        $id = $this->conn->insert_id;
    
        $new_task = "updated task";
        $_POST["id"] = $id;
        $_POST["task"] = $new_task;
        require_once __DIR__ . '/../src/update.php';
    
        $sql = "SELECT * FROM tasks WHERE id=$id";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        $this->assertEquals($new_task, $row["task"]);
    
        $sql = "DELETE FROM tasks WHERE id=$id";
        if ($this->conn->query($sql) === FALSE) {
            die("Error deleting test task: " . $this->conn->error);
        }
    }
}

?>
