<!DOCTYPE html>
<html lang="en">
<head>
  <title>Maestro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Maestros</h2>
  <form action="login-admin.php" method="post" >
    <div class="mb-3 mt-3">
      <label for="correo">Email:</label>
      <input type="email" class="form-control" id="correo" placeholder="Correo" name="correo">
    </div>
    <div class="mb-3">
      <label for="contrasena">Contrasena:</label>
      <input type="password" class="form-control" id="contrasena" placeholder="Clave" name="contrasena">
    </div>
    
    <button type="submit" class="btn btn-primary">Entrar</button>
  </form>
</div>

</body>
</html>
