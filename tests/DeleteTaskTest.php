<?php

use PHPUnit\Framework\TestCase;

class DeleteTaskTest extends TestCase
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
    }

    public function testDeleteTask()
    {
        $sql = "INSERT INTO tasks (task) VALUES ('task one')";
        if ($this->conn->query($sql) === FALSE) {
            die("Error inserting test task: " . $this->conn->error);
        }

        $id = $this->conn->insert_id;

        $_GET["id"] = $id;
        require_once __DIR__ . '/../src/delete.php';

        $sql = "SELECT * FROM tasks WHERE id=$id";
        $result = $this->conn->query($sql);
        $this->assertEquals(0, $result->num_rows);

        $sql = "DELETE FROM tasks WHERE id=$id";
        if ($this->conn->query($sql) === FALSE) {
            die("Error deleting test task: " . $this->conn->error);
        }
        
        $this->conn->close();
    }
}

?>
