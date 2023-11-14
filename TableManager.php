<?php
require_once 'Database.php';

class TableManager {
    private $conn;
    private $tableName;

    public function __construct($tableName) {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->tableName = $tableName;
    }

    public function addColumn($nombreCampo, $tipoCampo) {
        try {
            $sql = "ALTER TABLE " . $this->tableName . " ADD COLUMN $nombreCampo $tipoCampo";
            pg_query($this->conn, $sql) or die("Error al ejecutar la consulta: " . pg_last_error());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function __destruct() {
        pg_close($this->conn);
    }
}
?>
