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
    $servicio = $_POST["servicio"];
    
    $sql = "SELECT * FROM catalogo_servicios where id=$servicio";
    $query = mysqli_query($con,$sql);
    $datos = mysqli_fetch_array($query);
    
    if($datos[6] == 1){
        $sql = "UPDATE catalogo_servicios SET disponibilidad=0 WHERE id=$servicio";
    }
    else{
        $sql = "UPDATE catalogo_servicios SET disponibilidad=1 WHERE id=$servicio";

    }
    if(mysqli_query($con,$sql)){
        header("Location:../PHP/worker-app.php");
    }
    else{
        echo "Error Interno";
    }
?>