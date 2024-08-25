<?php
require_once "./Controladores/Login/login.controller.php"; // Asegúrate de que la ruta sea correcta
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EMESSA - Iniciar Sesión</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="./assets/temas/adminlte/dist/css/adminlte.min.css">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>EMESSA</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Inicia sesión para ingresar</p>

        <form action="index.php?ruta=Dashboard/dashboard" method="post">
          <div class="input-group mb-3">
            <input type="email" name="correo" class="form-control" placeholder="Email" required autocomplete="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="contraseña" class="form-control" placeholder="Contraseña" required autocomplete="current-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">Recuerdame</label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
            </div>
          </div>
        </form>

        <p class="mb-1">
          <a href="forgot-password.html">Olvidé mi contraseña</a>
        </p>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="./assets/temas/adminlte/dist/js/adminlte.js"></script>

  <?php
  // Lógica de inicio de sesión
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      LoginController::login();
  }
  ?>
</body>

</html>