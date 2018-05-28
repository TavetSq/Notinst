<?php 
    include('conexion.php');
    
    $usuario = $_POST['usuario'];
    $clave = $_POST['pass'];
    
     $ingresar = $mysqli->query("SELECT * FROM colegios WHERE usuario = '$usuario' AND clave = '$clave'");

    $ingreso = $ingresar->num_rows;

    if(!$ingreso)
    {
        $mensaje = 0;
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?id=' . $mensaje);
    }
    else
    {
       session_start();
       $_SESSION['logueado'] = true;
       $_SESSION['usuario'] = $usuario;
       $_SESSION['clave'] = $clave;
       header('Location: ../sistema.php');
    }

 ?>  
