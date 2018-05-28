<?php 
include('script/funciones.php');
include('script/conexion.php');
session_start();


  if($_SESSION['logueado'] == false)
  {
    session_destroy();
    header('Location: ingreso.php');
  }
  else
  {
    $usuario = $_SESSION['usuario'];
    $contraseña = $_SESSION['clave'];

    $sesion = $mysqli->query("SELECT * FROM colegios WHERE usuario = '$usuario' AND clave = '$contraseña'");

    if($row = $sesion->fetch_assoc()) 
    {
      $idcolegio = $row["idcolegio"];
      $nombre_colegio = $row["nombre"];
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>NOTINST - Eventos</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Righteous" rel="stylesheet">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css3animated/css/animations.css" type="text/css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Righteous" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-default navbar-static-top sistema">
 	<div class="container">
      <div class="animatedParent" data-sequence="400">
        <div class="navbar-header animated bounceInRight slow" data-id="1">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Menú oculto</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav hidden-xs">
            <li class="animated rotateInUpRight slow" data-id="1"><a href="#"><i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i></a></li>
            <li class="animated rotateInUpRight slow" data-id="1"><a href="#"><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i></a></li>
            <li class="animated rotateInUpRight slow" data-id="1"><a href="#"><i class="fa fa-google-plus-square fa-lg" aria-hidden="true"></i></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="buttons-inline animated fadeInLeft slower" data-id="2"><a class="btn btn-salir" href="script/cerrar-sesion.php"><i class="fa fa-sign-out" aria-hidden="true"></i> CERRAR SESIÓN</a></li>
          </ul>
        </div><!--/.nav-collapse -->
        </div><!-- /.animatedParent-->
      </div>
</nav>

<header class="sistema-mod-datos-header">
	<div class="container">
	 <div class="animatedParent" data-sequence="500">
	 <div class="row">
	 	<div class="col-lg-4 animated growIn slower" data-id="1">
	 		<img src="images/logo.png" alt="Notinst Logo" class="img-responsive margin-top-sm" data-id="1">
	 	</div>

	 	<div class="col-lg-4 col-lg-offset-4 animated rollIn slower hidden-xs hidden-sm" data-id="2">

    <h1>MODIFICAR DATOS</h1>

	 	</div>
	 </div>
	 </div>
	</div>
</header>

<section class="container cuerpo">
    <?php funcion('menu'); ?>
    <section>


      <?php 

    $registro = $mysqli->query("SELECT * FROM colegios WHERE usuario = '$usuario' AND clave = '$contraseña'");
    $row_cnt = $registro->num_rows;

    if($row_cnt > 0) 
    {
      if($row = $registro->fetch_assoc()) 
      {
        $pregunta = $row["pregunta_secreta"];
      }
    }
    else
    {
      session_destroy();
    }

    if($pregunta == "")
    {
      header('Location: sistema');
    }
    else
    {

      $consulta = $mysqli->query("SELECT * FROM colegios WHERE usuario = '$usuario' AND clave = '$contraseña'");

      if($rows = $consulta->fetch_assoc()) {
      ?>
<div class="container">
<div class="row">
 
  <div class="col-lg-8">

  <h3>Modificar datos</h3>

  <form action="sistema-modificar-datos" method="post" enctype="multipart/form-data">
  <?php

  echo '
        <div class="input-group margin-bottom-sm">
         <span class="input-group-addon"><i class="fa fa-graduation-cap fa-fw"></i></span><input type="text" class="form-control" placeholder="NOMBRE DEL COLEGIO" name="nombre_colegio" required value="'. $rows["nombre"] . '">
         </div>

<div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-users fa-fw"></i></span><input type="number" class="form-control" placeholder="CANTIDAD DE ESTUDIANTES" name="estudiantes" required value="'. $rows["estudiantes"] . '"> 
  </div>
  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span><input type="number" class="form-control" placeholder="NÚMERO TELEFÓNICO" name="telefono"  value="'. $rows["telefono"] . '">
  </div>
  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span><input type="text" class="form-control" placeholder="DIRECCIÓN" name="direccion" required value="'. $rows["direccion"] . '">
  </div>
  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-home fa-fw"></i></span><input type="number" class="form-control" placeholder="CÓDIGO POSTAL" name="codpostal" required value="'. $rows["codigo_postal"] . '">
  </div>
  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span><input type="email" class="form-control" placeholder="CORREO ELECTRÓNICO" name="email" required value="'. $rows["correo"] . '">
  </div>

  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-align-justify fa-fw"></i></span><input type="text" class="form-control" placeholder="LEMA DEL COLEGIO" name="lema" required value="'. $rows["lema"] . '">
  </div>

  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-image fa-fw"></i></span><input type="file" class="form-control" placeholder="LOGO DE LA INSTITUCIÓN" name="logo" accept="image/*">
  </div>

  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span><input type="text" class="form-control" placeholder="NOMBRE DE USUARIO" name="usuario" disabled value="'. $rows["usuario"] . '">
  </div>


<div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-unlock-alt fa-fw"></i></span><input type="password" class="form-control" placeholder="CONTRASEÑA NUEVA" name="pass">
  </div>
  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span><input type="password" class="form-control" placeholder="CONFIRMAR CONTRASEÑA NUEVA" name="pass2">
  </div> 
  <hr>

    <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-question fa-fw"></i></span><select name="pregunta-secreta" id="" class="form-control" placeholder="SELECCIONE UNA PREGUNTA DE SEGURIDAD" disabled>
    <option value="">'. $rows["pregunta_secreta"] . '</option>
    </select>
  </div>

  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-shield fa-fw"></i></span><input type="text" class="form-control" placeholder="RESPUESTA SECRETA" name="respuesta-secreta" requried>
  </div>
  ';


  if(isset($_POST['b-modificar']))
  {
    $respuesta_secreta = $_POST['respuesta-secreta'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $estudiantes = $_POST['estudiantes'];
    $telefono = $_POST['telefono'];
    $codpostal = $_POST['codpostal'];
    $nombre = $_POST['nombre_colegio'];
    $email = $_POST['email'];
    $lema = $_POST['lema'];
    $direccion = $_POST['direccion'];
    $nombre_img = "";

if(!empty( $_FILES["logo"]["name"]))
 {
    $nombre_img = $_FILES['logo']['name'];
    $tipo = $_FILES['logo']['type'];
    $tamaño = $_FILES['logo']['size'];
 }

    $rptasecreta = $mysqli->query("SELECT * FROM colegios WHERE usuario = '$usuario' AND clave = '$contraseña' AND respuesta_secreta = '$respuesta_secreta'");

    $row_cnt = $rptasecreta->num_rows;

    if($row_cnt == 0) 
    {
      echo '<div class="alert alert-danger" role="alert"><p>La respuesta secreta no coincide con la pregunta, por lo tanto, los cambios no han sido efectuados.</p></div>';

    }
    else
    {
      if($pass != $pass2)
      {
        echo '<div class="alert alert-danger" role="alert"><p>Las contraseñas ingresadas no coinciden, por lo tanto, los cambios no han sido efectuados.</p></div>';

      }
      else
      {
 
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
       echo '<div class="alert alert-danger" role="alert"><p>No se puede subir una imagen con el formato seleccionado. Por favor elija otra imagen.</p></div>';
       $nombre_img = "";

    }
} 
else 
{
   if($nombre_img == !NULL)
   {
    echo '<div class="alert alert-danger" role="alert"><p>La imagen seleccionado es demasiado grande.</p></div>';
    $nombre_img = "";
   }
}

if($pass != "")
{
  $modificar = $mysqli->query("UPDATE colegios SET nombre = '$nombre', lema = '$lema', logo = '$nombre_img', estudiantes = '$estudiantes', clave = '$pass', telefono = '$telefono', correo = '$email', codigo_postal = '$codpostal', direccion = '$direccion' WHERE idcolegio = '$idcolegio'");
}
else
{
  $modificar = $mysqli->query("UPDATE colegios SET nombre = '$nombre', lema = '$lema', logo = '$nombre_img', estudiantes = '$estudiantes', telefono = '$telefono', correo = '$email', codigo_postal = '$codpostal', direccion = '$direccion' WHERE idcolegio = '$idcolegio'");
}
      if($modificar)
      {
        echo '<div class="alert alert-success" role="alert"><p>Los datos han sido actualizadoso correctamente. Por favor refresce la página.</p></div>';
      }
      else
      {
        echo '<div class="alert alert-warning" role="alert"><p>Hubo un error al actualizar los datos.</p></div>';
      }

      }
    }
  }

  ?>

        <input type="reset" class="btn btn-default" value="REESTABLECER">
        <input type="submit" class="btn btn-warning" value="MODIFICAR" name="b-modificar"></input>
      </form>

  </div>
  <div class="col-lg-4 text-center">
     <p>
     <a href="sistema"><button class="btn btn-info"><i class="fa fa-undo" aria-hidden="true"></i> ADMINISTRACIÓN</button></a>

        <img src="images/administracion/3.jpg" alt="Sistemas" class="img-circle img-responsive center-block margin-bottom-sm">


        <div class="panel-group" id="preguntas-frecuentes">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#preguntas-frecuentes" href="#pregunta1">
        <i class="fa fa-plus" aria-hidden="true"></i> ¿Cómo modificar mis datos?</a>
      </h4>
    </div>
    <div id="pregunta1" class="panel-collapse collapse in">
      <div class="panel-body">Para modificar tus datos debes editar los campos que estén habilitados; si deseas deshacer los cambios debes darle al botón <u>REESTABLECER</u> y se reestablecerán los campos; es sumamente importante introducir la respuesta secreta correspondiente a la pregunta de seguridad para hacer efectivos los cambios.</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#preguntas-frecuentes" href="#pregunta2">
        <i class="fa fa-plus" aria-hidden="true"></i> ¿Por qué no puedo modificar mi usuario y pregunta secreta?</a>
      </h4>
    </div>
    <div id="pregunta2" class="panel-collapse collapse">
      <div class="panel-body">Debido a que son datos confidenciales que están almacenados en nuestro sistema está prohibido la modificación de éstos. Para modificarlos contactate con el soporte de NotInst.</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#preguntas-frecuentes" href="#pregunta3">
        <i class="fa fa-plus" aria-hidden="true"></i> ¿Cómo puedo cambiar mi contraseña?</a>
      </h4>
    </div>
    <div id="pregunta3" class="panel-collapse collapse">
      <div class="panel-body">Para cambiar tu contraseña simplemente debes ingresar la contraseña nueva y confirmar ésta; si no deseas cambiar la contraseña debes dejar estos campos <i>vacíos</i>.</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#preguntas-frecuentes" href="#pregunta4">
        <i class="fa fa-plus" aria-hidden="true"></i> ¿Por qué tener e-mail si no puedo usar éste para la recuperación de mi cuenta?</a>
      </h4>
    </div>
    <div id="pregunta4" class="panel-collapse collapse">
      <div class="panel-body">Registrar le correo electrónico de tu institución educativa es sumamente importante para el contacto con aquellos visitantes que deseen comunicarse con el centro educativo, mas no para recuperar la cuenta; para esto está la respuesta secreta con su correspondiente pregunta de seguridad.</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#preguntas-frecuentes" href="#pregunta5">
        <i class="fa fa-plus" aria-hidden="true"></i> No quiero que mi centro educativo esté visible para el público</a>
      </h4>
    </div>
    <div id="pregunta5" class="panel-collapse collapse">
      <div class="panel-body">Cuando decides entrar a nuestro sistema de eventos estás poniendo en público los datos de la institución y los eventos programados por ésta para que la comunidad se entere (pues ese es nuestro objetivo); si crees que cometiste un error al registrarte en NotInst por favor solicita la eliminación de tu cuenta.</div>
    </div>
  </div>
</div>
   </div>

</div>
</div>




      <?php
    }
  }
     ?>


      
    </section>
</section>

<footer class="pie-pagina">
	Desarrollado por Mariana Mosquera y Breyner Rojas &copy; 2016
</footer>

 <script src="js/bootstrap.min.js"></script>
 <script src="assets/css3animated/js/css3-animate-it.js"></script>
</body>
</html>