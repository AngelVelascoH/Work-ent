<?php
    session_start();
    include("conection.php");
    $con = conectar();
    if (isset($_SESSION["usuario"])) {
        $varsesion = $_SESSION["usuario"];
        $varsesion2 = $_SESSION["id"];
        }
        else{
            $varsesion = "";
        }
        
        if ($varsesion == null || $varsesion == "") {
            echo "Sin autorización para entrar a esta página.";
            die();
        }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <link rel="icon" type="image/x-icon" href="/Images/logo2.png" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="/CSS/styles5.css" />
    <script
      src="https://kit.fontawesome.com/099efb5fef.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg p-md-3 navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="/index.html"
          ><img src="/Images/logo3.png" alt="Work-ent" width="100px" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mx-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link mx-lg-5 link" href="feed.php"
                ><i class="fa-solid fa-screwdriver-wrench"></i
                >&nbsp;&nbsp;&nbsp;Servicios</a
              >
            </li>

            <li class="nav-item">
              <a id="join-btn" class="nav-link mx-lg-5" href="close.php"
                >Cerrar Sesión</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h1>
            Hola <?php echo $varsesion;?>, estos son los servicios que contrataste recientemente.
          </h1>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
    <div class="container">
      <div class="row pt-5">
        <div class="col-md-1"></div>
        <div class="col-md-10 col-sm-12">
          <div class="table-responsive-sm">
            <table class="table table-dark table-hover text-center align-middle">
              <thead>
                <tr>
                  <th scope="col">#ID</th>
                  <th scope="col">Servicio</th>
                  <th scope="col">Trabajador</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Estatus</th>
                </tr>
              </thead>
              <tbody>
                <?php
               $sql = "SELECT * FROM registros_principal WHERE cliente = $varsesion2"; 
               
               $datos = mysqli_fetch_all(mysqli_query($con,$sql));
               foreach($datos as $dato){
                $servicio = mysqli_fetch_array(mysqli_query($con,"SELECT catalogo_servicios.nombre, usuarios.name FROM registros_principal
INNER JOIN catalogo_servicios ON registros_principal.servicio=catalogo_servicios.id
INNER JOIN usuarios ON registros_principal.trabajador=usuarios.user_id WHERE registros_principal.servicio = $dato[2]
"));
if($dato[5]==0){
  $estatus = '<i class="fa-solid fa-flag"></i>&nbsp;&nbsp;Pendiente';
  $sextaCol= '<div class="d-grid gap-2 col-6 mx-auto"><button onclick="clicked(event)" type="submit" name="valor" class="btn btn-outline-light finalizar">Aclaración</button><div>';
}else
{
  $estatus =  '<i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;Completado';
  $sextaCol= '<div class="d-grid gap-2 col-6 mx-auto"><button onclick="clicked(event)" type="submit" name="valor" class="btn btn-outline-light finalizar">Reseña</button><div>';
}
                echo '<tr>
      <th scope="row">'.$dato[0].'</th>
      <td>'.$servicio[0].'</td>
      <td>'.$servicio[1].'</td>
      <td>'.$dato[4].'</td>
      <td>'.$estatus.'</td>
    </tr>';
                
               }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"
  ></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
