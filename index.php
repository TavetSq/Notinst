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
<?php include('script/funciones.php'); funcion('sistema'); ?>
          </ul>
        </div><!--/.nav-collapse -->
        </div><!-- /.animatedParent-->
      </div>
</nav>

<header class="home-header">
	<div class="container">
	 <div class="animatedParent" data-sequence="500">
	 <div class="row">
	 	<div class="col-lg-4 animated growIn slower" data-id="1">
	 		<img src="images/logo.png" alt="Notinst Logo" class="img-responsive margin-top-sm" data-id="1">
	 	</div>
	 	<div class="col-lg-4 col-lg-offset-4 animated rollIn slower hidden-xs hidden-sm" data-id="2">
	 	 <form action="instituciones.php" method="post" class="form-inline margin-bottom-sm">
	 	 	<div class="form-group"><br><br><br>
	 	 		<input type="text" class="form-control" id="colegio" name="colegio" placeholder="COLEGIO">
	 	 		<button for="colegio" class="btn btn-search" type="submit" name="btn-inicio-buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
	 	 	</div>
	 	 </form>

	 	</div>
	 </div>
	 </div>
	</div>
</header>

<section class="container animatedParent" data-sequence="500">
    <?php funcion('menu'); ?>

    <section class="container-fluid">
    <div class="row"> 
    
    <div class="col-lg-4 text-center">
    <img src="images/mision.png" class="animated rotateInDownLeft slower img-responsive center-block img-circle" data-id="1">
      <h2 class="animated bounceInLeft slower" data-id="1">Misión</h2>
      <p class ="animated bounceIn slower" data-id="1">Nuestro principal objetivo es prestar un servicio informativo a las comunidades educativas de la comuna, facilitando a los administrativos la publicacion de su agenda escolar e información de la institución.</p>
    </div>

<div class="col-lg-4 text-center">
    <img src="images/notinst.png" class="animated swing slower img-responsive center-block img-circle" data-id="1">
      <h2 class="animated bounceInDown slower" data-id="1">NotInst</h2>
      <p class="animated bounceIn slower" data-id="1">NotInst es una plataforma diseñada para las instituciones educativas de la comuna. Como su nombre lo indica consta especificamente de mantener informada a la comunidad educativa sobre los eventos del presente año, eventos anteriores y eventos próximos, manual de convivencia y simbolos institucionales.</p>
    </div>
    <div class="col-lg-4 text-center">
    <img src="images/vision.png" class=" animated rotateInDownRight slower img-responsive center-block img-circle" data-id="1">
      <h2 class="animated bounceInRight slower" data-id="1">Visión</h2>
      <p class="animated bounceIn slower" data-id="1">En un futuro pretendemos ampliar el número de instituciones vinculadas a este proyecto y asi prestar nuestros servicios en un nivel nacional. A su vez llevaremos nuetros servicios a plataformas móviles, haciéndolo más interactivo.</p>
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