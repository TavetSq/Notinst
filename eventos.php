<?php 

include('script/conexion.php');
 if(!isset($_GET['institucion']))
  { 
    Header("Location: instituciones");
  }
  else
  {
    $idinstitucion = $_GET['institucion'];
    $colegio = $mysqli->query("SELECT * FROM colegios WHERE idcolegio = '$idinstitucion'");

    $eventos = $mysqli->query("SELECT * FROM eventos WHERE idcolegio = '$idinstitucion'");
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

  <style>
    ul,li{list-style-type:none;margin:0;padding:0;}.calendar{padding:30px;}.calendar .day{background:#ecf0f1;border-bottom:2px solid #bdc3c7;float:left;margin:3px;position:relative;height:105px;width:105px;}.day.marked{background:#3498db;border-color:#2980b9;}.day .day-number{color:#7f8c8d;left:5px;position:absolute;top:5px;}.day.marked .day-number{color:white;}.day .events{color:white;margin:29px 7px 7px;height:78px;overflow-x:hidden;overflow-y:hidden;}.day .events h5{margin:0 0 5px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;width:100%;}.day .events strong,.day .events span{display:block;font-size:11px;}.day .events ul{}.day .events li{} a { color: #FAFAFA !important; }
     .btn-info{
      width:100%;
      background-color:white;
      color:#16243e !important;
     }
     .btn-info:hover{
      width:100%;
      background-color:gray !important;
      color:white !important;
     }
   a:hover { text-decoration: none; }
  </style>
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

<header class="eventos-header">
	<div class="container">
	 <div class="animatedParent" data-sequence="500">
	 <div class="row">
	 	<div class="col-lg-4 animated growIn slower" data-id="1">
	 		<img src="images/logo.png" alt="Notinst Logo" class="img-responsive margin-top-sm" data-id="1">
	 	</div>

	 	<div class="col-lg-4 col-lg-offset-4 animated rollIn slower hidden-xs hidden-sm" data-id="2">

    <h1>EVENTOS PUBLICADOS</h1>

	 	</div>
	 </div>
	 </div>
	</div>
</header>

<section class="container cuerpo">
    <?php funcion('menu'); ?>
    <section>

    <div class="row">
    <div class="col-lg-12">
      <?php 
      if($rows = $colegio->fetch_assoc()) 
      {

    echo '<table width="100%">';


          if($rows["logo"] == "")
          {
            echo '<tr><td valign="middle" width="30%"><img class="img-responsive img-circle logo-colegio" src="images/default.png"></td>';
          }
          else
          {
            echo '<tr><td vliang="middle" width="30%"><img class="img-responsive img-circle logo-colegio" src="images/colegios/' . $rows["logo"] . '"></td>';
          }

             echo '<td valign="middle" width="70%"><h2 class="text-center">' . strtoupper($rows["nombre"]) . '</h2>' .
    '<blockquote class="text-center">' . $rows["lema"] . '</blockquote></td></tr>';


    echo '</table><br>';
      }
       ?>
    </div>
    	<div class="col-lg-2">
       <div class="panel panel-primary no-borders">
  <div class="panel-heading panel-p">
    <h3 class="panel-title panel-p">ÚLTIMOS EVENTOS</h3>
  </div>
  <div class="panel-body">
  <?php 

echo '<ul>';
   while($rows = $eventos->fetch_assoc()) 
      {
          echo '<li>' . $rows['nombre'] . '<br>'; 
          echo '<small>' .  $rows['inicio_fecha'] . ' / ';
          echo $rows['fin_fecha'] . '</small>';

          echo '</li>';
      }
echo '</ul>';
       ?>
  </div>
      </div>
      </div>
    	<div class="col-lg-8">

<div class="panel panel-primary no-borders">
  <div class="panel-heading panel-p">
    <h3 class="panel-title panel-p">CALENDARIO DE EVENTOS</h3>
  </div>
  <?php 
  if(isset($_GET['eliminar']))
      {
  echo '<br><div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Informacion!</strong> El evento seleccionado fue eliminado correctamente de la base de datos.
</div>';

      } ?>
  <div class="panel-body calendar">
    <?php

        $result = $mysqli->query("SELECT * FROM eventos WHERE idcolegio = '$_GET[institucion]'");

        if( !$result )
            die( $mysqli->error );

        $events = array();

        while($row = $result->fetch_assoc())
        {
            $start_date = new DateTime($row['inicio_fecha']);
            $end_date = new DateTime($row['fin_fecha']);
            $day = $start_date->format('j');
            $mes = $start_date->format('m');

            $events[$day][] = array(
              'fechaini' => $row['inicio_fecha'],
              'fechafin' => $row['fin_fecha'],
                'inicia' => $row['inicio'],
                'finaliza' => $row['fin'],
                'institucion' => $idinstitucion,
                'descripcion' => $row['descripcion'],
                'titulo' => $row['nombre'],
                'publico' => $row['publico'],
                'estado' => $row['estado'],
                'imagen' => $row['imagen'],
                'idevento' => $row['idevento'],
                'mes' => $mes
            );
        }


        if(isset($_GET['mes']))
        {
          $mes_buscar = $_GET['mes'];
        }
        else
        {
          $datetime = new DateTime();
        }

        // mes en texto
        $txt_months = array(
            'Enero', 'Febrero', 'Marzo',
            'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre',
            'Octubre', 'Noviembre', 'Diciembre'
        );


        if(isset($_GET['mes']))
        {
          $month_txt = $txt_months[$mes_buscar-1];
        }
        else
        {
          $month_txt = $txt_months[$datetime->format('n')-1];
        }


        

        // ultimo dia del mes
        if(isset($_GET['mes']))
        {

          $diasn = cal_days_in_month(CAL_GREGORIAN, $mes_buscar, date('Y'));
         $month_days = date($diasn, strtotime("last day of"));
        }
        else
        {
          $month_days = date('j', strtotime("last day of"));
        }

        echo '<h1>' . $month_txt . '</h1>';

        foreach(range(1, $month_days) as $day)
        {
            $marked = false;
            $events_list = array();

            foreach($events as $event_day => $event)
            {
                // si el dia del evento coincide lo marcamos y guardamos la informacion
                if($event_day == $day)
                {
                  $events_list = $event;

                  foreach($events_list as $event)
                    {

        if(isset($_GET['mes']))
        {
          if($event['mes']  == $mes_buscar)
                      {
                        $marked = true;
                      }
        }
        else
        {
          if($event['mes']  == $datetime->format('m'))
                      {
                        $marked = true;
                      }
        }

                    }
                    break;  
                }
            }

            echo '
            <div class="day' . ($marked ? ' marked' : '') . '">
                <strong class="day-number">' . $day . '</strong>
                <div class="events"><ul>';

                    foreach($events_list as $event)
                    {
                      if($marked)
                      {
                        echo '<li><a data-toggle="modal" data-target="#' . $event['idevento'] . '">
                            <h5>' . $event['titulo'] . '</h5>
                            <div>
                                <span>Ampliar información</span>
                            </div>
                        </li>';
                    }
                  }

                echo '</a></ul></div>
            </div>';
        }
        ?>
  </div>
      </div>


    	</div>
      <div class="col-lg-2">
        <div class="panel panel-primary no-borders">
  <div class="panel-heading panel-p">
    <h3 class="panel-title panel-p">EVENTOS POR MES</h3>
  </div>

  <div class="panel-body text-center">

  <a class="btn btn-info" href="<?php echo $_SERVER['REQUEST_URI'] . '&mes=1'; ?>">Enero</a>
  <a class="btn btn-info margin-top-sm" href="<?php echo $_SERVER['REQUEST_URI'] . '&mes=2'; ?>">Febrero</a>
  <a class="btn btn-info margin-top-sm" href="<?php echo $_SERVER['REQUEST_URI'] . '&mes=3'; ?>">Marzo</a>
  <a class="btn btn-info margin-top-sm" href="<?php echo $_SERVER['REQUEST_URI'] . '&mes=4'; ?>">Abril</a>
  <a class="btn btn-info margin-top-sm" href="<?php echo $_SERVER['REQUEST_URI'] . '&mes=5'; ?>">Mayo</a>
  <a class="btn btn-info margin-top-sm" href="<?php echo $_SERVER['REQUEST_URI'] . '&mes=6'; ?>">Junio</a>
  <a class="btn btn-info margin-top-sm" href="<?php echo $_SERVER['REQUEST_URI'] . '&mes=7'; ?>">Julio</a>
  <a class="btn btn-info margin-top-sm" href="<?php echo $_SERVER['REQUEST_URI'] . '&mes=8'; ?>">Agosto</a>
  <a class="btn btn-info margin-top-sm" href="<?php echo $_SERVER['REQUEST_URI'] . '&mes=9'; ?>">Septiembre</a>
  <a class="btn btn-info margin-top-sm" href="<?php echo $_SERVER['REQUEST_URI'] . '&mes=10'; ?>">Octubre</a>
  <a class="btn btn-info margin-top-sm" href="<?php echo $_SERVER['REQUEST_URI'] . '&mes=11'; ?>">Noviembre</a>
  <a class="btn btn-info margin-top-sm"  href="<?php echo $_SERVER['REQUEST_URI'] . '&mes=12'; ?>">Diciembre</a>

  
  </div>
      </div>
      </div>
    </div>      
    </section>
</section>


<?php 
// Modals



foreach(range(1, $month_days) as $day)
        {
            $marked = false;
            $events_list = array();

            foreach($events as $event_day => $event)
            {
                // si el dia del evento coincide lo marcamos y guardamos la informacion
                if($event_day == $day)
                {
                    $marked = true;
                    $events_list = $event;
                    break;
                }
            }
 foreach($events_list as $event)
 {

   echo '<div class="modal fade" tabindex="-1" role="dialog" id="' . $event['idevento'] . '">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">' . $event['titulo'] . '</h4>
      </div>
      <div class="modal-body">
        ';

if($event["imagen"] == "")
          {
            echo '<img class="img-responsive img-thumbnail" src="images/default-eventos.jpg">';
          }
          else
          {
            echo '<img class="img-responsive img-thumbnail center-block" style="max-height: 300px" src="images/eventos/' . $event["imagen"] . '">';
          }

echo '<table width="100%">';



 echo  
              '<tr><td width="30%"></td><td width="70%"></tr>' .
              '<tr><p>' . '<td><strong>Descripcion</strong></td><td> ' . $event["descripcion"] . '</td></p></tr>' .
              '<tr><p>' . '<td><strong>Publico</strong></td><td> ' . $event["publico"] . '</td></p></tr>' .
              '<tr><p>' . '<td><strong>Fecha</strong></td><td> ' . $event["fechaini"] . ' - ' . $event["fechafin"]  . '</td></p></tr>' .

              '<tr><p>' . '<td><strong>Hora de inicio</strong></td><td> ' . $event["inicia"] . '</td></p></tr>' .
              '<tr><p>' . '<td><strong>Hora de fin</strong></td><td> ' . $event["finaliza"] . '</td></p></tr>' .
              '<tr><p>' . '<td><strong>Estado</strong></td><td> ' . $event["estado"] . '</td></p></tr>' 
         ;
echo '</table>';

        echo '
      </div>
      <div class="modal-footer">';

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

     echo '<a class="btn btn-primary" href="' . $_SERVER['REQUEST_URI'] . '&eliminar=' . $event['idevento'] . '">Eliminar evento</a>';
      if(isset($_GET['eliminar']))
      {
        $eliminar = $mysqli->query("DELETE FROM eventos WHERE idevento = '$_GET[eliminar]'");
      }
    }
    else
    {
      session_destroy();
    }
}

    echo '
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>';

 }

}
 ?>

<footer class="pie-pagina">
	Desarrollado por Mariana Mosquera y Breyner Rojas &copy; 2016
</footer>


 <script src="js/bootstrap.min.js"></script>
 <script src="assets/css3animated/js/css3-animate-it.js"></script>
</body>
</html>