<?php
class Database {
    private $host = "desarrollodea.postgres.database.azure.com";
    private $db_name = "DEA";
    private $username = "administrador";
    private $password = "Urbanik2023*";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        $connectionString = "host={$this->host} dbname={$this->db_name} user={$this->username} password={$this->password}";
        $this->conn = pg_connect($connectionString) or die("Failed to create connection to database: " . pg_last_error());
        return $this->conn;
    }
}
?>
