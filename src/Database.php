<?php

class Database {
    private $host = "localhost";
    private $db_name = "your_database_name";
    private $username = "your_database_username";
    private $password = "your_database_password";
    public $conn;

    // Get the database connection
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}