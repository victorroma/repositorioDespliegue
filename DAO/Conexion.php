<?php

$conexion = mysqli_connect ("localhost", "root", "root");
mysqli_select_db($conexion, "proyecto_almacen_fase2") or die ("Base de datos muerta!");

//if($conexion->connect_error=null){
//    echo"<p> $error conectando a la base de datos $conexion->connect error </p>";
//    exit();
//}



