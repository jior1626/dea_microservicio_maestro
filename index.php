<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Formulario para Crear Campo Dinámico</title>
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
    <h1>Crear Campo Dinámico</h1>
    <form action="procesar.php" method="post">
        <div id="camposDinamicos">
            <!-- Los campos dinámicos se insertarán aquí -->
        </div>
        <button type="button" onclick="agregarCampo()">Agregar Más Campos</button>
        <br>
        <input type="submit" value="Crear Campo">
    </form>
</body>
</html>