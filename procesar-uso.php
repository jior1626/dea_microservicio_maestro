<?php
require_once 'TableManager.php';

try {
    $tableManager = new TableManager("TBL_USO"); // Asegúrate de que esta sea la tabla correcta

    foreach ($_POST['nombreCampo'] as $index => $nombreCampo) {
        $tipoCampo = $_POST['tipoCampo'][$index];
        $tableManager->addColumn($nombreCampo, $tipoCampo);
    }

    echo "Campos agregados exitosamente.";
} catch (Exception $e) {
    echo "Error al agregar campos: " . $e->getMessage();
}
?>