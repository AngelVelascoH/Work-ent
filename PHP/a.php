<?php
/* Sesiones en PHP */
    session_start();
    include("conection.php");
    $con = conectar();
    $usuario = $_POST['mail'];
    $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT,['cost' => 10]); 
    $sql = "SELECT pass  FROM usuarios WHERE mail = '$usuario'";
    $query = mysqli_query($con,$sql);
    $sql2 = "SELECT * FROM usuarios WHERE mail= '$usuario'";
    $password = mysqli_fetch_array($query);
    
     if(password_verify($_POST['pass'],$password[0]) == false or mysqli_num_rows(mysqli_query($con,$sql)) == 0 or $usuario == null or $password == null):
        {
            echo "1";
        }
    

else:{ 
    $query2 = mysqli_query($con,$sql2);
    $data = mysqli_fetch_array($query2);
    $_SESSION['usuario'] = $data[1];
    $_SESSION['id'] = $data[0];
    $_SESSION['tipo'] = $data[5];
    if($data[5] == 2):
    {
        echo "3";
    }
else:{
        echo "2";
    }
endif;
}
endif;
    ?>
