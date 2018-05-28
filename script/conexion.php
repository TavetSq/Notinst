<?php 
$mysqli = new mysqli("localhost", "root", "", "notinst");

if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

date_default_timezone_set("America/Bogota");

?>