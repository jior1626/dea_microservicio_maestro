<?php
session_start(); // Inicia la sesión PHP

// Verifica si el usuario está logueado (cambia 'usuario' al nombre de la variable de sesión que estés usando)
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php"); // Redirige al usuario a la página de login
    exit(); // Termina la ejecución del script
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>Administrador</h1>
  <p>Crea el maestro</p> 
</div>
  
<div class="container mt-5">
  <div class="row">

    <div class="col-sm-4">
      <h3>Crear campos de DEA</h3>
      <p>Agrega o elimina campos de la tabla</p>
      <a href="crear-campos-dea.php">Crear</a>
    </div>

    <div class="col-sm-4">
      <h3>Crear campos uso DEA</h3>
      <p>Agrega o elimina campos de la tabla</p>
      <a href="crear-campos-uso.php">Crear</a>
    </div>

    <div class="col-sm-4">
      <h3>Column 3</h3>        
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>

  </div>
</div>

</body>
</html>
