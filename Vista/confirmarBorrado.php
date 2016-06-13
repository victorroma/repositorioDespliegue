<?php
include_once '../Modelo/Ocupacion.php';
include_once '../Modelo/Caja.php';
include_once '../Modelo/CajaSorpresa.php';
include_once '../Modelo/CajaFuerte.php';
include_once '../Modelo/CajaNegra.php';

session_start();


$cajaPaBorrar = $_SESSION['cajaPaBorrar'];

$ocupacion = $cajaPaBorrar[0];
$caja = $cajaPaBorrar[1];
?>
<html lang="en">
    <head>
        <script src="JS/todoJavaScript.js"></script>
    </head>

    <body>

        <form action="../Controlador/controladorConfirmarBorrado.php">

            <p>Estas seguro de que desea borrar la caja:</p>

            <p>Id:</p><?php echo $caja->getId(); ?> 
            <p>Altura:</p><?php echo $caja->getAltura(); ?> 
            <p>Anchura:</p><?php echo $caja->getAnchura(); ?> 
            <p>Profundidad:</p><?php echo $caja->getProfundidad(); ?> 
            <p>Color:</p><?php echo $caja->getColor(); ?> 
            <p>Tipo:</p><?php echo $ocupacion->getTipo(); ?> 



            <p><input type="submit"></p>
        </form>

    </body>
</html>