<?php
include("conection.php");
$con = conectar();
$name = $_POST['name'];
$lastName = $_POST['lastName'];
$fullName = $name . " " . $lastName; 
$mail = $_POST['mail'];
$pass= password_hash($_POST['pass'],PASSWORD_DEFAULT,['cost' => 10]); ;
$number = $_POST['number'];
$type = $_POST['type'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/CSS/styles3.css">
    <title>Registro</title>
  </head>
  <body>
        <div class="main-container">
      <div class="header">
        <div class="logo">
          <a href="/index.html">
          <img
            src="/Images/logo3.png"
            alt="logo-blanco"
            class="logo"
            width="100px"
            href="index.html"
          /></a>
        </div>
        <div>
        </div>
      </div>
      <div class="content2">
        
        <div class="register-form2">
          <div class="register-result">
              <?php
$query = "SELECT * FROM usuarios WHERE mail = '$mail'";
if (mysqli_num_rows(mysqli_query($con,$query))>0):{
?>
 <h1>Tu cuenta ya existe</h1>
       <h2>Este correo ya se encuentra registrado en WorkEnt!</h2>
<?php
}
else: {
 $query2 = "INSERT INTO usuarios(name, mail, pass, phone, type) VALUES('$fullName','$mail','$pass',$number,$type) ";
if( mysqli_query($con,$query2)):
    {
        ?>
<h1>Bienvenido a WorkEnt</h1>
            <h2>  Comienza a contratar servicios sin la necesidad de salir de casa.</h2>
<?php
    }
else:
    {?>
<h1>Error</h1>
            <h2>Error interno, por favor intentar mas tarde.</h2>
   <?php }
endif;   
}
endif;
?>

                      <a class="submit-btn" href="/login.html">Iniciar Sesión</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
