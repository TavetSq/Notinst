
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

<header class="instituciones-header">
	<div class="container">
	 <div class="animatedParent" data-sequence="500">
	 <div class="row">
	 	<div class="col-lg-4 animated growIn slower" data-id="1">
	 		<img src="images/logo.png" alt="Notinst Logo" class="img-responsive margin-top-sm" data-id="1">
	 	</div>

	 	<div class="col-lg-4 col-lg-offset-4 animated rollIn slower hidden-xs hidden-sm" data-id="2">

    <h1>INSTITUCIONES EDUCATIVAS</h1>

	 	</div>
	 </div>
	 </div>
	</div>
</header>

<section class="container cuerpo">
    <?php funcion('menu'); ?>
    <section>

    <div class="row">
    	<div class="col-lg-8">
 <div class="panel panel-primary no-borders">
  <div class="panel-heading panel-p">
    <h3 class="panel-title panel-p">RESULTADO DE BÚSQUEDA</h3>
  </div>
  <div class="panel-body">
    <?php 
    include('script/conexion.php');

    $consulta = $mysqli->query("SELECT * FROM colegios");

    if(isset($_POST['btn-inicio-buscar']) || isset($_POST['btn-buscar']))
    {
    	$criterio = $_POST['colegio'];

    	$consulta = $mysqli->query("SELECT * FROM colegios WHERE nombre LIKE '%$criterio%'");
    }

    if(isset($_POST['btn-buscar-direccion']))
    {
    	$criterio = $_POST['direccion'];
    	$consulta = $mysqli->query("SELECT * FROM colegios WHERE direccion LIKE '%$criterio%'");
    }

    if(isset($_POST['btn-buscar-telefono']))
    {
    	$criterio = $_POST['telefono'];
    	$consulta = $mysqli->query("SELECT * FROM colegios WHERE telefono LIKE '%$criterio%'");
    }

    if(isset($_POST['btn-buscar-postal']))
    {
    	$criterio = $_POST['codpostal'];
    	$consulta = $mysqli->query("SELECT * FROM colegios WHERE codigo_postal LIKE '%$criterio%'");
    }

  while($rows = $consulta->fetch_assoc()) {

    echo '<div class="panel panel-instituciones">
           <div class="panel-body">'
            ;
    echo '<h2 class="text-center">' . strtoupper($rows["nombre"]) . '</h2>' .
    '<blockquote class="text-center">' . $rows["lema"] . '</blockquote>';

    echo '<div class="row lg-col">';
          
    echo '<div class="col-xs-12 col-sm-3 col-lg-4">';

          if($rows["logo"] == "")
          {
          	echo '<img class="img-responsive img-circle logo-colegio" src="images/default.png">';
          }
          else
          {
          	echo '<img class="img-responsive img-circle logo-colegio" src="images/colegios/' . $rows["logo"] . '">';
          }
    echo '</div>';


    echo '<div class="col-xs-12 col-sm-9 col-lg-8"><table width="80%">';

          echo  
              '<tr><p>' . '<td><strong>No. Estudiantes</strong></td><td> ' . $rows["estudiantes"] . '</td></p></tr>' .
              '<tr><p>' . '<td><strong>Teléfono</strong></td><td> ' . $rows["telefono"] . '</td></p></tr>' .
              '<tr><p>' . '<td><strong>Correo electrónico</strong></td><td> ' . $rows["correo"] . '</td></p></tr>' .
              '<tr><p>' . '<td><strong>Cod. Postal</strong></td><td> ' . $rows["codigo_postal"] . '</td></p></tr>' .
              '<tr><p>' . '<td><strong>Dirección</strong></td><td> ' . $rows["direccion"] . '</td></p></tr>' .
              '<tr><p><td><a href="eventos.php?institucion=' . $rows["idcolegio"] .'"><button class="btn btn-info"><i class="fa fa-calendar"></i> VER EVENTOS</button></a></td></p></tr>'
         ;
    echo '</table>
    </div>';

           echo '
             </div>
            </div>
          </div>';
      }
           ?>
  </div>
</div>
    	</div>
    	<div class="col-lg-4">
 <div class="panel panel-primary no-borders">
  <div class="panel-heading panel-p">
    <h3 class="panel-title panel-p">CRITERIOS DE BÚSQUEDA</h3>
  </div>
  <div class="panel-body">
    <form action="instituciones.php" method="post" class="form-inline margin-bottom-sm">
    <div class="text-center">
	 	 	<div class="form-group">
	 	 		<input type="text" class="form-control" id="colegio" name="colegio" placeholder="COLEGIO">
	 	 		<button for="colegio" class="btn btn-search" type="submit" name="btn-buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
	 	 	</div>

	 	 	<br><br>

	 	 	<div class="form-group">
	 	 		<input type="text" class="form-control" id="direccion" name="direccion" placeholder="DIRECCIÓN">
	 	 		<button for="direccion" class="btn btn-search" type="submit" name="btn-buscar-direccion"><i class="fa fa-search" aria-hidden="true"></i></button>
	 	 	</div>

	 	 	<br><br>

	 	 	<div class="form-group">
	 	 		<input type="number" class="form-control" id="telefono" name="telefono" placeholder="TELÉFONO">
	 	 		<button for="telefono" class="btn btn-search" type="submit" name="btn-buscar-telefono"><i class="fa fa-search" aria-hidden="true"></i></button>
	 	 	</div>

	 	 	<br><br>

	 	 	<div class="form-group">
	 	 		<input type="number" class="form-control" id="codpostal" name="codpostal" placeholder="COD. POSTAL">
	 	 		<button for="codpostal" class="btn btn-search" type="submit" name="btn-buscar-postal"><i class="fa fa-search" aria-hidden="true"></i></button>
	 	 	</div>

      </div>

	 	 	<br>

	 	 	<button class="btn btn-info" type="submit" name="none"><i class="fa fa-reply-all" aria-hidden="true"></i> MOSTRAR TODOS</button>
	 	 </form>
  </div>
</div>   		
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