<?php
use PHPUnit\Framework\TestCase;

class FetchTasksTest extends TestCase
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

    public function testFetchTasks()
    {
        $sql = "INSERT INTO tasks (task) VALUES ('task one')";
        if ($this->conn->query($sql) === FALSE) {
            die("Error inserting test task: " . $this->conn->error);
        }

        $sql = "INSERT INTO tasks (task) VALUES ('task two')";
        if ($this->conn->query($sql) === FALSE) {
            die("Error inserting test task: " . $this->conn->error);
        }

        ob_start();
        require __DIR__ . '/../src/fetch.php';
        $output = ob_get_clean();

        $expected_result = '[{"id":"1","task":"task one"},{"id":"2","task":"task two"}]';
        $this->assertEquals($expected_result, $output);

        $sql = "DELETE FROM tasks WHERE task IN ('task one', 'task two')";
        if ($this->conn->query($sql) === FALSE) {
            die("Error deleting test tasks: " . $this->conn->error);
        }
    }

    protected function tearDown(): void
    {
        $this->conn->close();
    }
}

?>