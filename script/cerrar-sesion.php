<?php 

    session_start(); 
    $_SESSION['logueado'] = false;
    session_destroy();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
 ?>