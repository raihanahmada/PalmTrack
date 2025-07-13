<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "sawit";
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    public function execute($sql) {
        $result = $this->conn->query($sql);
        $data = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function getConnection() {
        return $this->conn;
    }

    public function lastInsertId() {
        return $this->conn->insert_id;
    }

    public function insertAndGetId($sql) {
        if ($this->conn->query($sql) === TRUE) {
            return $this->conn->insert_id;
        } else {
            // Debug jika error SQL
            echo "<pre>Insert error: " . $this->conn->error . "\nSQL: $sql</pre>";
            return 0;
        }
    }
}
?>
