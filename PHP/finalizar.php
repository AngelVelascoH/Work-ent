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
$valor = $_POST['valor'];
$sql = "UPDATE registros_principal
SET estatus=1 WHERE id=$valor";
if(mysqli_query($con,$sql)){
    header("Location:../PHP/perfil-trabajador.php");
}
else{
    echo "Error interno, vuelva a intentarlo.";
}
?>