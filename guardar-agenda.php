<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'Database.php';
    $db = new Database();
    $conn = $db->getConnection();

    $columns = implode(", ", array_keys($_POST));
    $values = implode(", ", array_map(function($item) use ($conn) { return "'" . pg_escape_string($conn, $item) . "'"; }, $_POST));

    $query = "INSERT INTO TBL_AGENDA ($columns) VALUES ($values)";
    $result = pg_query($conn, $query);

    if ($result) {
        // Redireccionar o mostrar un mensaje de éxito
        // Redireccionar a otra página después de la inserción exitosa
        header('Location: adminPanel.php');
        exit;
    } else {
        // Manejar errores
        echo "Hubo un error";
    }
}
?>
