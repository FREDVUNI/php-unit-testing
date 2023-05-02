<?php
use PHPUnit\Framework\TestCase;

class CreateTaskTest extends TestCase
{
    public function testCreateTask()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tasks_todo_tests";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $task = "test task";

        $_POST["task"] = $task;
        $_POST["submit"] = "true"; 

        require_once __DIR__ . '/../src/process.php';

        $sql = "SELECT * FROM tasks WHERE task='$task'";
        $result = $conn->query($sql);
        $this->assertEquals(1, $result->num_rows);

        $row = $result->fetch_assoc();
        $this->assertEquals($task, $row['task']);

        $id = $row['id'];

        $sql = "DELETE FROM tasks WHERE id=$id";
        if ($conn->query($sql) === FALSE) {
            die("Error deleting test task: " . $conn->error);
        }
        $conn->close();
    }
}
?>
