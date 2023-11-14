<?php
session_start(); // Iniciar la sesión al comienzo del script

include 'Database.php'; // Asegúrate de que la ruta sea correcta

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consulta para obtener el hash de la contraseña del usuario
    $query = "SELECT contrasena, rol FROM usuarios WHERE correo = '$correo'";
    $result = pg_query($conn, $query);

    if (pg_num_rows($result) == 1) {
        $row = pg_fetch_assoc($result);

        // Verifica la contraseña con password_verify()
        if (password_verify($contrasena, $row['contrasena'])) {
            // Verifica si el rol del usuario es Administrador
            if ($row['rol'] == 'Administrador') {
                $_SESSION['usuario'] = $correo; // o cualquier otro dato que quieras almacenar en la sesión
                header("Location: adminPanel.php"); // Redirige al panel de administrador
            } else {
                echo "No tienes permisos de administrador.";
            }
        } else {
            echo "Correo o contraseña incorrectos.";
        }
    } else {
        echo "Correo o contraseña incorrectos.";
    }
}
?>
