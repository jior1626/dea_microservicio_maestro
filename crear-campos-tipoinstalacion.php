<!-- index.php -->
<?php
session_start(); // Inicia la sesión PHP

// Verifica si el usuario está logueado (cambia 'usuario' al nombre de la variable de sesión que estés usando)
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php"); // Redirige al usuario a la página de login
    exit(); // Termina la ejecución del script
}
include 'Database.php';
$db = new Database();
$conn = $db->getConnection();

// Obtener los nombres de las columnas
$columnQuery = "SELECT column_name FROM information_schema.columns WHERE table_name = 'tbl_tipoinstalacion'";
$columnResult = pg_query($conn, $columnQuery);

$columns = [];
while ($row = pg_fetch_assoc($columnResult)) {
    $columns[] = $row['column_name'];
}

// Obtener los datos de la tabla
$dataQuery = "SELECT * FROM TBL_TIPOINSTALACION";
$dataResult = pg_query($conn, $dataQuery);

if (!$dataResult) {
    echo "An error occurred.\n";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function agregarCampo() {
            var container = document.getElementById("camposDinamicos");
            var nombreCampo = document.createElement("input");
            nombreCampo.type = "text";
            nombreCampo.name = "nombreCampo[]";
            nombreCampo.required = true;

            var tipoCampo = document.createElement("select");
            tipoCampo.name = "tipoCampo[]";
            tipoCampo.required = true;
            var opciones = ["integer", "text", "character varying", "date"];
            opciones.forEach(function(opcion) {
                var opt = document.createElement("option");
                opt.value = opcion;
                opt.innerHTML = opcion;
                tipoCampo.appendChild(opt);
            });

            container.appendChild(document.createTextNode("Nombre del Campo: "));
            container.appendChild(nombreCampo);
            container.appendChild(document.createTextNode(" Tipo de Campo: "));
            container.appendChild(tipoCampo);
            container.appendChild(document.createElement("br"));
        }
    </script>
</head>
<body>

<div class="container">
    <h1>Crear Campo Dinámico</h1>
    <form action="procesar-tipoinstalacion.php" method="post">
        <div id="camposDinamicos">
            <!-- Los campos dinámicos se insertarán aquí -->
        </div>
        <button type="button" class="btn btn-success" onclick="agregarCampo()">Agregar Más Campos</button>
        <br><br>
        <input type="submit" class="btn btn-info" value="Crear Campo">
    </form>
</div>

<br>
<div class="container">
    <p>Para agregar nuevos registros</p>
    <!-- Botón para abrir el modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">
    Agregar Nuevo Registro
</button>
</div>

<div class="container">
        <h2>Tabla DEA</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <?php foreach ($columns as $columnName): ?>
                        <th><?php echo htmlspecialchars($columnName); ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = pg_fetch_assoc($dataResult)) {
                    echo "<tr>";
                    foreach ($columns as $columnName) {
                        echo "<td>" . htmlspecialchars($row[$columnName]) . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


     <!-- Modal -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel">Nuevo Registro</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario se insertará aquí -->
                <?php 
                echo '<form id="insertForm" method="post" action="guardar-tipoinstalacion.php">';
                foreach ($columns as $columnName) {
                    if ($columnName != 'id') { // Ignorar la columna 'id'
                        echo '<div class="form-group">';
                        echo '<label for="' . htmlspecialchars($columnName) . '">' . htmlspecialchars(ucfirst($columnName)) . '</label>';
                        echo '<input type="text" class="form-control" name="' . htmlspecialchars($columnName) . '" required>';
                        echo '</div>';
                    }
                }
                echo '<br><input type="submit" class="btn btn-primary" id="submitForm" value="Guardar" />';
                echo '</form>';
                
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>