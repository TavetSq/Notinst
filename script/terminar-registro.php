<?php 
    include('conexion.php');
    session_start();

    $usuario = $_SESSION['usuario'];
    $contraseña = $_SESSION['clave'];


    $consulta = $mysqli->query("SELECT * FROM colegios WHERE usuario = '$usuario' AND clave = '$contraseña'");
    $resultado = $consulta->num_rows;


    if($resultado > 0)
    {

     if($row = $consulta->fetch_assoc()) 
      {
        $pregunta = $row["pregunta_secreta"];
      }
      if($pregunta != "")
      {
        header('Location: ../sistema.php');
        exit();
      }

    $lema = $_POST['lema'];
    $pregunta = $_POST['pregunta-secreta'];
    $respuesta = $_POST['respuesta-secreta'];
    $nombre_img = "";
 
if(!empty( $_FILES["logo"]["name"]))
 {
    $nombre_img = $_FILES['logo']['name'];
    $tipo = $_FILES['logo']['type'];
    $tamaño = $_FILES['logo']['size'];
 }
    
if(($nombre_img == !NULL) && ($tamaño <= 200000)) 
{
   if (($tipo == "image/gif")
   || ($tipo == "image/jpeg")
   || ($tipo == "image/jpg")
   || ($tipo == "image/png"))
   {
      $directorio = $_SERVER['DOCUMENT_ROOT'].'/Notinst-1/images/colegios/';
      move_uploaded_file($_FILES['logo']['tmp_name'],$directorio.$nombre_img);
    } 
    else 
    {
       $mensaje = 21;
      header('Location: ' . $_SERVER['HTTP_REFERER'] . '?id=' . $mensaje);
    }
} 
else 
{
   if($nombre_img == !NULL)
   {
    $mensaje = 22;
      header('Location: ' . $_SERVER['HTTP_REFERER'] . '?id=' . $mensaje);
   }
}



    	$result = $mysqli->query("UPDATE colegios SET lema = '$lema', pregunta_secreta = '$pregunta', respuesta_secreta = '$respuesta', logo = '$nombre_img' WHERE usuario = '$usuario' AND clave = '$contraseña'");

        if($mysqli->affected_rows > 0) 
        { 

        	$mensaje = 20;
    	header('Location: ' . $_SERVER['HTTP_REFERER'] . '?id=' . $mensaje);
        }
    }
    else
    {
        header('Location: ../sistema.php');
        exit();
    }

           
    

 ?>  
