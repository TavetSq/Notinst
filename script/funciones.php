<?php

function evaluar($valor) 
{
  $nopermitido = array("'",'\\','<','>',"\"");
  $valor = str_replace($nopermitido, "", $valor);
  return $valor;
}

function _formatear($fecha)
{
  return strtotime(substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2)." " .substr($fecha, 10, 6)) * 1000;
}

function funcion($funcion)
{
 switch($funcion)
 {
  case 'sistema':
  {
     session_start();
if(isset($_SESSION['logueado']))
{
  if($_SESSION['logueado'] == true)
    { 
      include('script/conexion.php');
      $usuario = $_SESSION['usuario'];
    $contraseña = $_SESSION['clave'];
    $sesion = $mysqli->query("SELECT * FROM colegios WHERE usuario = '$usuario' AND clave = '$contraseña'");
    if($row = $sesion->fetch_assoc()) 
    {
      $nombre_colegio = $row["nombre"];
    }
    else
    {
      session_destroy();
    }

     echo '<li class="buttons-inline animated fadeInLeft slower" data-id="2"><a class="btn btn-salir" href="sistema.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> ' . strtoupper($nombre_colegio) . '</a></li>';
    }
    else
    {
      session_destroy();
    }
}
else
{
  echo '
  <li class="buttons-inline animated fadeInLeft slower" data-id="2"><a class="btn btn-registro" href="registro.php"><i class="fa fa-user" aria-hidden="true"></i> REGISTRO</a></li>
    <li class="buttons-inline animated fadeInLeft slower" data-id="2"><a class="btn btn-login" href="ingreso.php"><i class="fa fa-lock" aria-hidden="true"></i> INGRESO</a></li>';
}

 break;
  }
 	case 'menu':
 	{
 		echo '
 		<nav class="navbar navbar-default menu">
  <div class="container-fluid animatedParent" data-sequence="500">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Menú oculto</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index"><i class="fa fa-home" aria-hidden="true"></i> INICIO</a></li>
        <li><a href="instituciones"><i class="fa fa-university" aria-hidden="true"></i> INSTITUCIONES</a></li>
        <li><a href="eventos"><i class="fa fa-calendar" aria-hidden="true"></i> EVENTOS</a></li>
                
      </ul>
    </div>
  </div>
   </nav>';
     break;
 	}
 } 
}

?>