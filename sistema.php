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

<header class="sistema-header">
	<div class="container">
	 <div class="animatedParent" data-sequence="500">
	 <div class="row">
	 	<div class="col-lg-4 animated growIn slower" data-id="1">
	 		<img src="images/logo.png" alt="Notinst Logo" class="img-responsive margin-top-sm" data-id="1">
	 	</div>

	 	<div class="col-lg-4 col-lg-offset-4 animated rollIn slower hidden-xs hidden-sm" data-id="2">

    <h1>ÁREA DE ADMINISTRACIÓN</h1>

	 	</div>
	 </div>
	 </div>
	</div>
</header>

<section class="container cuerpo">
    <?php funcion('menu'); ?>
    <section>


      <?php 

  if(isset($_GET['id']))
   {
    if($_GET['id'] == 20)
    {
      echo '<div class="alert alert-success" role="alert"><p>¡Registrado correctamente, gracias por utilizar Notinst!</p></div>';
    }

    if($_GET['id'] == 21)
    {
      echo '<div class="alert alert-danger" role="alert"><p>No se puede subir una imagen con el formato seleccionado. Por favor elija otra imagen.</p></div>';

    }

    if($_GET['id'] == 22)
    {
      echo '<div class="alert alert-danger" role="alert"><p>La imagen seleccionado es demasiado grande.</p></div>';

    }
   }

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
      echo '<div class="alert alert-success" role="alert"><p>¡Gracias por registrarte en nuestro sistema! Aún debes completar el registro de tu colegio. Por favor diligencia el siguiente formulario para proceder</p></div>';
      ?>

<div class="row">
     <div class="col-lg-8 col-lg-offset-2">

      <form action="script/terminar-registro.php" method="post" enctype="multipart/form-data">
  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-align-justify fa-fw"></i></span><input type="text" class="form-control" placeholder="LEMA DEL COLEGIO" name="lema" required>
  </div>

  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-question fa-fw"></i></span><select name="pregunta-secreta" id="" class="form-control" placeholder="SELECCIONE UNA PREGUNTA DE SEGURIDAD" required>
    <option value="">SELECCIONE UNA PREGUNTA DE SEGURIDAD</option>
    <option value="Equipo de deporte preferido">Equipo de deporte preferido</option>
    <option value="Mejor estudiante del año">Mejor estudiante del año</option>
    <option value="Nombre del profesor más destacado">Nombre del profesor más destacado</option>
    <option value="Fecha de la fundación de la institución educativa">Fecha de la fundación de la institución educativa</option>
    <option value="Fundador de la institución educativa">Fundador de la institución educativa</option>
    <option value="Personaje histórico preferido">Personaje histórico preferido</option>
    <option value="Plato de comida preferido">Plato de comida preferido</option>
    <option value="Programa televisivo preferido">Programa televisivo preferido</option>
    </select>
  </div>

  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-shield fa-fw"></i></span><input type="text" class="form-control" placeholder="RESPUESTA SECRETA" name="respuesta-secreta" required>
  </div>

  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-image fa-fw"></i></span><input type="file" id="logo" class="form-control" placeholder="LOGO DE LA INSTITUCIÓN" name="logo" accept="image/*">
  </div>


        <input type="reset" class="btn btn-default" value="REESTABLECER">
        <input type="submit" class="btn btn-primary" VALUE="TERMINAR REGISTRO">
        </form>
</div>
      </div>

      <?php

    }
    else
    {
      ?>
<div class="container">
<div class="row">
 
  <div class="col-lg-7">

  <h3>Bienvenido al sistema de administración</h3>
  <p>Dentro del sistema administrativo de NotInst podrás gestionar todos los eventos publicados por tu persona, así como agregarlos y modificar tus datos de registro.</p>

  <img src="images/administracion/1.jpg" alt="Sistemas" class="img-circle img-responsive center-block">

  </div>
  <div class="col-lg-5">
     

     <p>

        <a href="sistema-modificar-datos"><button for="colegio" class="btn btn-info" name="btn-inicio-buscar"><i class="fa fa-cogs" aria-hidden="true"></i> MODIFICAR DATOS</button></a>

       <!-- <a href="sistema-gestionar-eventos"><button for="colegio" class="btn btn-info" name="btn-inicio-buscar"><i class="fa fa-pencil" aria-hidden="true"></i> GESTIONAR EVENTO</button></a> -->
 
        <a href="sistema-crear-evento"><button for="colegio" class="btn btn-info" name="btn-inicio-buscar"><i class="fa fa-plus-circle" aria-hidden="true"></i> AGREGAR EVENTO</button></a>
      </p>

        <img src="images/administracion/2.jpg" alt="Sistemas" class="img-circle img-responsive center-block">
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