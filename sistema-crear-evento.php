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

<header class="sistema-crear-eventos-header">
	<div class="container">
	 <div class="animatedParent" data-sequence="500">
	 <div class="row">
	 	<div class="col-lg-4 animated growIn slower" data-id="1">
	 		<img src="images/logo.png" alt="Notinst Logo" class="img-responsive margin-top-sm" data-id="1">
	 	</div>

	 	<div class="col-lg-4 col-lg-offset-4 animated rollIn slower hidden-xs hidden-sm" data-id="2">

    <h1>CREAR EVENTOS</h1>

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
      ?>
<div class="container">
<div class="row">
 
  <div class="col-lg-8">

  <h3>Programar un evento <small>
    <?php
    echo date('l jS \of F Y h:i:s A'); ?>
  </small></h3>


  <form action="sistema-crear-evento" method="post" enctype="multipart/form-data">

  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-file-text fa-fw"></i></span><input type="text" class="form-control" placeholder="NOMBRE DEL EVENTO" name="nombre-evento" required>
  </div>

  <p>IMAGEN</p>
  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-image fa-fw"></i></span><input type="file" id="img" class="form-control" placeholder="IMAGEN DEL EVENTO" name="img" accept="image/*">
  </div>

  <p>DESCRIPCIÓN</p>
  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-align-left fa-fw"></i></span><textarea type="text" class="form-control" name="descripcion-evento" required rows="4"></textarea>
  </div>

  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-users fa-fw"></i></span><select name="publico-evento" class="form-control" required>
    <option value="">SELECCIONE EL PÚBLICO</option>
    <option value="Estudiantes">Estudiantes</option>
    <option value="Profesores">Profesores</option>
    <option value="Acudientes">Acudientes</option>
    <option value="Comunidad Educativa">Comunidad Educativa</option>
    <option value="Todos">Todos</option>
    <option value="No especifica">No especifica</option>
    <option value="">Otros</option>
    </select>
  </div>


  <p>FECHA DE INICIO</p>
  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span><input type="date" class="form-control" name="fechaini" required>
  </div>

  <p>FECHA DE FINALIZACIÓN</p>
  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span><input type="date" class="form-control" name="fechafin" required>
  </div>

  <p>HORA INICIO</p>
  <div class="input-group margin-bottom-sm">
  
    <span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span><input type="time" class="form-control" name="inicio" required>
  </div>

  <p>HORA FIN</p>
  <div class="input-group margin-bottom-sm">
  
    <span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span><input type="time" class="form-control" name="fin" required>
  </div>


  <?php 

  if(isset($_POST['b-publicar']))
  {
    $nombre = $_POST['nombre-evento'];
    $descripcion = $_POST['descripcion-evento'];
    $publico = $_POST['publico-evento'];
    $fechaini = $_POST['fechaini'];
    $fechafin = $_POST['fechafin'];
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];
    $nombre_img = "";

    if(!empty( $_FILES["img"]["name"]))
    {
      $nombre_img = $_FILES['img']['name'];
      $tipo = $_FILES['img']['type'];
      $tamaño = $_FILES['img']['size'];
    }

    if(($nombre_img == !NULL) && ($tamaño <= 200000)) 
{
   if (($tipo == "image/gif")
   || ($tipo == "image/jpeg")
   || ($tipo == "image/jpg")
   || ($tipo == "image/png"))
   {
      $directorio = $_SERVER['DOCUMENT_ROOT'].'/Notinst-1/images/eventos/';
      move_uploaded_file($_FILES['img']['tmp_name'],$directorio.$nombre_img);
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
    echo '<div class="alert alert-danger" role="alert"><p>La imagen seleccionada es demasiado grande.</p></div>';
    $nombre_img = "";
   }
}

$insertar = $mysqli->query("INSERT INTO eventos VALUES ('', '$idcolegio', '$nombre', '$fechaini', '$fechafin', '$descripcion', '$publico', 'Programado', '$inicio', '$fin', '$nombre_img')");

if($insertar)
{
  echo '<div class="alert alert-success" role="alert"><p>Evento publicado con éxito.</p></div>';
}
else
{

  echo '<div class="alert alert-warning" role="alert"><p>Hubo un error publicando el evento.</p></div>';
}

  }


   ?>


        <input type="reset" class="btn btn-default" value="REESTABLECER">
        <input type="submit" class="btn btn-primary" VALUE="PUBLICAR EVENTO" name="b-publicar">
        </form>


  </div>
  <div class="col-lg-4 text-center">
     <p>
     <a href="sistema"><button for="colegio" class="btn btn-info" name="btn-inicio-buscar"><i class="fa fa-undo" aria-hidden="true"></i> ADMINISTRACIÓN</button></a>
      </p>
        <img src="images/administracion/4.jpg" alt="Sistemas" class="img-circle img-responsive center-block margin-bottom-sm">

        <div class="panel-group" id="preguntas-frecuentes">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#preguntas-frecuentes" href="#pregunta1">
        <i class="fa fa-plus" aria-hidden="true"></i> ¿Cómo creo un evento?</a>
      </h4>
    </div>
    <div id="pregunta1" class="panel-collapse collapse in">
      <div class="panel-body">Para crear un evento sólo debes diligenciar el formulario que se encuentra a la par y enviarlo.</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#preguntas-frecuentes" href="#pregunta2">
        <i class="fa fa-plus" aria-hidden="true"></i> ¿Como edito o elimino un evento?</a>
      </h4>
    </div>
    <div id="pregunta2" class="panel-collapse collapse">
      <div class="panel-body">Para editar o eliminar un evento debes ingresar al <a href="sistema-gestionar-eventos">apartado de gestión de eventos</a>.</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#preguntas-frecuentes" href="#pregunta3">
        <i class="fa fa-plus" aria-hidden="true"></i> ¿Qué hago con el horario si mi evento dura todo el día?</a>
      </h4>
    </div>
    <div id="pregunta3" class="panel-collapse collapse">
      <div class="panel-body">Puedes poner en la hora de inicio y de fin que empiece e iniece a las 00:00 a.m y 00:00 p.m respectivamente.</div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#preguntas-frecuentes" href="#pregunta4">
        <i class="fa fa-plus" aria-hidden="true"></i> ¿Qué hago con la si mi evento dura dos o más días?</a>
      </h4>
    </div>
    <div id="pregunta4" class="panel-collapse collapse">
      <div class="panel-body">Debes publicar nuevamente tu evento en los días que se extenderá el mismo.</div>
    </div>
  </div>
</div>

   </div>

</div>
</div>




      <?php
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