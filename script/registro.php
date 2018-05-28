<?php 
    include('conexion.php');

    $nombre_colegio = $_POST['nombre_colegio'];
    $estudiantes = $_POST['estudiantes'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $codpostal = $_POST['codpostal'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['pass'];
    $confirmarclave = $_POST['pass2'];

    $contar_usuarios = $mysqli->query("SELECT * FROM colegios WHERE usuario = '$usuario'");
    $numero_usuarios = $contar_usuarios->num_rows;



    if($clave != $confirmarclave)
    {
    	$mensaje = 0;
    	header('Location: ' . $_SERVER['HTTP_REFERER'] . '?id=' . $mensaje);
    }
    else if($numero_usuarios > 0)
    {
    	$mensaje = 2;
    	header('Location: ' . $_SERVER['HTTP_REFERER'] . '?id=' . $mensaje);
    }
    else
    {
    	$result = $mysqli->query("INSERT INTO colegios VALUES ('', '$nombre_colegio', '', '', '$estudiantes', '$usuario', '$clave', '', '', '$telefono', '$email','$codpostal', '$direccion')");

        if($mysqli->affected_rows > 0) 
        { 
        	session_start();
            $_SESSION['logueado'] = true;
            $_SESSION['usuario'] = $usuario;
            $_SESSION['clave'] = $clave;
            header('Location: ../sistema.php');
        }
        else 
        { 
        	$mensaje = 1;
    	header('Location: ' . $_SERVER['HTTP_REFERER'] . '?id=' . $mensaje);
        }
    }

           
    

 ?>  
