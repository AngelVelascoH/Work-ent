<?php
 session_start();
    include("conection.php");
    $con = conectar();
    $varsesion2 = $_SESSION['id'];
     if (isset($_SESSION["usuario"])) {
    $varsesion = $_SESSION["usuario"];
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
    <link rel="stylesheet" href="/CSS/styles4.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script>
    <script
      src="https://kit.fontawesome.com/099efb5fef.js"
      crossorigin="anonymous"
    ></script>
    <title>WorkEnt</title>
    <link rel="icon" type="image/x-icon" href="/Images/logo2.png" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg p-md-3">
      <div class="container">
        <a class="navbar-brand" href="/index.html"
          ><img src="/Images/logo.png" alt="Work-ent" width="100px" />
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
              <a class="nav-link mx-lg-5 link" href="perfil-trabajador.php"
                ><i class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;<?php
                      echo "$varsesion";?></a
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

        <form action="cambioestatus.php" method="post">
    <div class="container pt-4 pb-5">
 <div class="row pb-5 text-center">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 title"><h1>Bienvenido, <?php echo "$varsesion";?>, estos son tus servicios:</h1></div>
        <div class="col-lg-3"></div>
      </div>
      <div class="row g-5">
        <?php
        $sql = "SELECT * FROM catalogo_servicios where trabajador=$varsesion2";
        $query = mysqli_query($con,$sql);
        $servicios = mysqli_fetch_all($query);

        foreach($servicios as $servicio){
          if($servicio[6] == '1'){
          $estatus = "<i class='fa-solid fa-pause'></i>&nbsp;&nbsp;Pausar";
          $clase = "activo";
        }

          else{
            $estatus ="<i class='fa-solid fa-play'></i>&nbsp;&nbsp;Reanudar";
            $clase ="inactivo";
          }
         echo '<div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <img
              src="data:image/jpg; base64,'.base64_encode($servicio[5]).'"
              alt=""
              class="card-img-top service-img"
            />
            <div class="card-body">
              <h5 class="card-title">'.$servicio[1].'</h5>
              <p class="card-text">
               '.$servicio[2].' 
              </p>
            </div>
            <div class="card-footer">
              <h5 class="card-title">$'.$servicio[3].'hr</h5>
            </div>
            <div class="card-footer text-center d-grid gap-2">
              <button type="input" name="servicio" value="'.$servicio[0].'" class="btn btn-primary '.$clase.' style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"">'.$estatus.'</a>
            </div>
          </div>
        </div>'; 
        }
        ?>
      </div>
      </form>

    <div class="container">
      <div id="add-service" class="row mt-5 text-center align-items-center add-btn">
        <div class="col-2"><i class="fa-solid fa-circle-plus"></i></div>
        <div class="col-8"><h1>Agregar servicio</h1></div>
    </div>  
     </div>   
    <div class="container">
      <div id="check-service" class="row mt-5 text-center align-items-center add-btn">
        <div class="col-2"><i class="fa-solid fa-list-check"></i></div>
        <div class="col-8"><h1>Consultar solicitudes</h1></div>
    </div>  
     </div>
  </body><script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/JS/addService.js"></script>
</html>
