<?php
session_start();
if (isset($_SESSION['tipo'])) {
  $var = $_SESSION['tipo'];
  
  if($var == 1){
    header("Location:/PHP/feed.php");
  }
  if($var == 2){
    header("Location:/PHP/worker-app.php");
  }
}
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/styles2.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script>
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/Images/logo2.png" />
  </head>
  <body>
    <div class="container login-box">
      <div class="logo">
        <img src="Images/logo.png" alt="logo" class="login-img" />
        <label>BIENVENIDO</label>
      </div>
      <form id="formulario-login">
        <div class="inputs">
          <input
            type="text"
            class="input-field"
            name="mail"
            id="mail"
            placeholder="Usuario"
          />
          <input
            type="password"
            name="pass"
            id="pass"
            class="input-field"
            placeholder="Contraseña"
          />

          <input type="submit" value="Siguiente" class="submit-btn" />
        </div>
      </form>
      <a href="register.php">¿No tienes cuenta? Registrate aquí.</a>
    </div>
  </body>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="JS/login.js"></script>
</html>
