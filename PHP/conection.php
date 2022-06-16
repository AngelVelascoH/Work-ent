<?php
function conectar(){
    $user="root";
    $pass="";
    $server="localhost";
    $db="workent";
    $con=mysqli_connect($server,$user,$pass,$db) or die ("Error al conectar a la bd");
    return $con;
    
}



?>