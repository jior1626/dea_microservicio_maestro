<!-- index.php -->
<?php
session_start(); // Inicia la sesión PHP

// Verifica si el usuario está logueado (cambia 'usuario' al nombre de la variable de sesión que estés usando)
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php"); // Redirige al usuario a la página de login
    exit(); // Termina la ejecución del script
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
</body>
</html>