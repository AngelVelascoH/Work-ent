<?php
session_start();
$id = $_SESSION['id'];
include("conection.php");
$con = conectar();
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
 $archivo = $_FILES["image"]["tmp_name"]; 
 $tamanio = $_FILES["image"]["size"];
 $tipo    = $_FILES["image"]["type"];
 $nombre  = $_FILES["image"]["name"];
if ( $archivo != "none" )
 {
    $fp = fopen($archivo, "rb");
    $contenido = fread($fp, $tamanio);
    $contenido = addslashes($contenido);
    
 }
$sql = "INSERT INTO catalogo_servicios values(0,'$name','$description',$price,'$id','$contenido')";
$query = mysqli_query($con,$sql);
if(mysqli_affected_rows($con) > 0):{
    header("Location:/PHP/worker-app.php");
}
else:{
    echo "Error Interno, por favor, vuelva a intentarlo";
}
endif;
?>
