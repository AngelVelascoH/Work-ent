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
    <title>Registrate</title>
    <link rel="icon" type="image/x-icon" href="/Images/logo2.png" />
    <link rel="stylesheet" type="text/css" href="CSS/styles3.css" />
  </head>
  <body>
    <div class="main-container">
      <div class="header">
        <div class="logo">
          <a href="index.html">
          <img
            src="Images/logo3.png"
            alt="logo-blanco"
            class="logo"
            width="100px"
            href="index.html"
          /></a>
        </div>
        <div>
          <a href="login.php" class="login-btn">¿Ya tienes una cuenta?</a>
        </div>
      </div>
      <div class="content">
        <div class="text">
          <h1>
            Únase a la red número 1 de contratación de servicios en México
          </h1>
          <h4>Comience a usar WorkEnt</h4>
        </div>
        <div class="register-form">
          <div>
            <h1>Regístrate ahora</h1>
          </div>
          <div">
                  <form action="PHP/register.php" id="formulario" method="post">
        <div class="inputs">
            <div class="name-input">
          <input
            type="text"
            class="input-field"
            name="name"
            id="name"
            placeholder="Nombre"
          />
          <input
            type="text"
            name="lastName"
            id="LastName"
            class="input-field"
            placeholder="Apellido"
          /></div><input
            type="text"
            name="mail"
            id="mail"
            class="input-field"
            placeholder="Correo"
          /><input
            type="password"
            name="pass"
            id="pass"
            class="input-field"
            placeholder="Contraseña"
          /><input
            type="tel"
            maxlength="10"
            name="number"
            id="number"
            class="input-field"
            placeholder="Teléfono"
          />
        </div>
        <div>
            <h4>Selecciona el tipo de usuario</h4>
        </div>
        <div class="user-type-input">
<div class="select">
  <select name="type">
    <option value="1">Cliente</option>
    <option value="2">Trabajador</option>
  </select>
</div>
</div>
          <input type="submit" value="Siguiente" class="submit-btn" />
              </form>
          </div>
        </div>
      </div>
    </div>
    
  </body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="JS/registro.js"></script>
</html>
