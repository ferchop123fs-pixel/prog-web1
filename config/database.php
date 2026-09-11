<?php
class Database {
    private $host = "localhost";
    private $db_name = "testdb";
    private $username = "biblioteca_user";
    private $password = "12345";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        } catch (Exception $e) {
            echo "Error de conexion: " . $e->getMessage();
        }
        return $this->conn;
    }
}