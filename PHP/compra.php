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

    $id = $_GET["pid"];
    $sql = "SELECT * FROM catalogo_servicios where id = $id";
    $query = mysqli_query($con,$sql);
    $datos = mysqli_fetch_array($query);
    $fecha_actual = date("Y-m-d");
    $sql2 = "INSERT INTO registros_principal values(0,$varsesion2,$datos[0],$datos[4],'$fecha_actual')";
     
    if(mysqli_query($con,$sql2)){
        header("Location:../PHP/perfil-cliente.php");
    }
    else{
        echo "Error Interno";
    }
?>