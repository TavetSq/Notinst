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
            <li class="buttons-inline animated fadeInLeft slower" data-id="2"><a class="btn btn-registro" href="registro.php"><i class="fa fa-user" aria-hidden="true"></i> REGISTRO</a></li>
          </ul>
        </div><!--/.nav-collapse -->
        </div><!-- /.animatedParent-->
      </div>
</nav>

<header class="registro-header">
	<div class="container">
	 <div class="animatedParent" data-sequence="500">
	 <div class="row">
	 	<div class="col-lg-4 animated growIn slower" data-id="1">
	 		<img src="images/logo.png" alt="Notinst Logo" class="img-responsive margin-top-sm" data-id="1">
	 	</div>

	 	<div class="col-lg-4 col-lg-offset-4 animated rollIn slower hidden-xs hidden-sm" data-id="2">

    <h1>INGRESAR AL SISTEMA</h1>

	 	</div>
	 </div>
	 </div>
	</div>
</header>

<section class="container cuerpo">

    <?php include('script/funciones.php'); funcion('menu'); ?>
    <section class="container-fluid">
     <div class="row">
     <div class="col-lg-8 col-lg-offset-2">
    <form action="script/ingreso.php" method="post">
  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span><input type="text" class="form-control" placeholder="NOMBRE DE USUARIO" name="usuario" required>
  </div>

  <div class="input-group margin-bottom-sm">
    <span class="input-group-addon"><i class="fa fa-unlock-alt fa-fw"></i></span><input type="password" class="form-control" placeholder="CONTRASEÑA" name="pass" required>
  </div>

 <?php 

   if(isset($_GET['id']))
   {
    if($_GET['id'] == 0)
    {
      echo '<div class="alert alert-danger" role="alert"><p>El usuario y/o la contraseña son incorrectos</p></div>';

    }
   }
  ?>

        <input type="reset" class="btn btn-default" value="REESTABLECER">
        <input type="submit" class="btn btn-primary" VALUE="INGRESAR">
        </form>

      </div>
      </div>
    </section>
</section>

<footer class="pie-pagina">
	Desarrollado por Mariana Mosquera y Breyner Rojas &copy; 2016
</footer>

 <script src="js/bootstrap.min.js"></script>
 <script src="assets/css3animated/js/css3-animate-it.js"></script>
</body>
</html>