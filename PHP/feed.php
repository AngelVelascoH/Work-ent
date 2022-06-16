<?php
 session_start();
    include("conection.php");
    $con = conectar();
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
    <script
      src="https://kit.fontawesome.com/099efb5fef.js"
      crossorigin="anonymous"
    ></script>
    <title>Feed</title>
    <link rel="icon" type="image/x-icon" href="/Images/logo2.png" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg  p-md-3">
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
                    <a class="nav-link mx-lg-5 link" href="perfil-cliente.php"
                      ><i class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;<?php
                      echo "$varsesion";?></a>
                  </li>
                  
                  <li class="nav-item">
                    <a
                      id="join-btn"
                      class="nav-link mx-lg-5"
                      href="close.php"
                >Cerrar Sesión</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    <div class="container ">
      <div class="row pt-3 pb-5 text-center">
        <div class="col-4"></div>
        <div class="col-4 title"><h1>Servicios</h1></div>
        <div class="col-4"></div>
      </div>
    <div class="row g-5 pb-5">
     <?php
        $sql = "SELECT * FROM catalogo_servicios WHERE disponibilidad = 1";
        $query = mysqli_query($con,$sql);
        $servicios = mysqli_fetch_all($query);
        foreach($servicios as $servicio){
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
              <a href="compra.php?pid='.$servicio[0].'"   class="btn btn-primary boton-compra  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"">Contratar</a>
            </div>
          </div></div>
        '; 
        }
        ?>
      
      </div></div>
     <section class="footer">
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
          <!-- Section: Social media -->
          <section
            class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
          >
            <!-- Left -->
            <div class="me-5 d-none d-lg-block"></div>
            <!-- Left -->

            <!-- Right -->
            <div>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
              </a>
            </div>
            <!-- Right -->
          </section>
          <!-- Section: Social media -->

          <!-- Section: Links  -->
          <section class="">
            <div class="container text-center text-md-start mt-5">
              <!-- Grid row -->
              <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                  <!-- Content -->
                  <h6 class="text-uppercase fw-bold mb-4">WorkEnt</h6>
                  <p>
                    Somos la plataforma número 1 de subcontratación a
                    trabajadores informales en México, nuestro objetivo es
                    apoyar al cliente y al trabajador.
                  </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->

                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-5 col-lg-4 col-xl-4 mx-auto mb-8">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">Links útiles</h6>
                  <p>
                    <a href="#!" class="text-reset">Trabajar en WorkEnt</a>
                  </p>
                  <p>
                    <a href="#!" class="text-reset">Iniciar Sesión</a>
                  </p>
                  <p>
                    <a href="#!" class="text-reset">Únete</a>
                  </p>
                  <p>
                    <a href="#!" class="text-reset">Explorar Servicios</a>
                  </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
                  <p><i class="fas fa-home me-3"></i>México G.A.M CDMX</p>
                  <p>
                    <i class="fas fa-envelope me-3"></i>
                    support@workent.com
                  </p>
                  <p><i class="fas fa-phone me-3"></i> + 55 15 87 28 20</p>
                  <p><i class="fas fa-phone me-3"></i> + 55 26 48 75 14</p>
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row -->
            </div>
          </section>
          <!-- Section: Links  -->

          <!-- Copyright -->
          <div
            class="text-center p-4"
            style="background-color: rgba(0, 0, 0, 0.05)"
          >
            © 2022 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/"
              >WorkEnt.com</a
            >
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->
      </section>
    <!-- Bootstrap js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
