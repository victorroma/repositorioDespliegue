<?php

include_once '../Modelo/Caja.php';
include_once '../Modelo/CajaNegra.php';
include_once '../Modelo/CajaSorpresa.php';
include_once '../Modelo/CajaFuerte.php';
include_once '../DAO/Operaciones.php';
include_once '../Modelo/Ocupacion.php';

session_start();

$altura = $_REQUEST["altura"];
$anchura = $_REQUEST["anchura"];
$profundidad = $_REQUEST["profundidad"];
$color = $_REQUEST["color"];
$estante = $_REQUEST["estanteLibre"];
$idEstanteria = $_REQUEST["codigo"]; //<select name="codigo"> <option>...



$tipo = $_REQUEST["tipo"];
switch ($tipo) {
    case 'fuerte':
        $codigoSeguridad = $_REQUEST["codigoSeguridad"];
        $cajaFuerte = new CajaFuerte($altura, $anchura, $profundidad, $color, $codigoSeguridad);
        $ocupacion = new Ocupacion($idEstanteria, $estante, 'fuerte');
        $devolucion = Operaciones::insertarCajaFuerte($cajaFuerte, $ocupacion);
        break;
    case 'negra':
        $placa = $_REQUEST["placa"];
        $cajaNegra = new CajaNegra($altura, $anchura, $profundidad, $color, $placa);
        $ocupacion = new Ocupacion($idEstanteria, $estante, 'negra');
        $devolucion = Operaciones::insertarCajaNegra($cajaNegra, $ocupacion);
        break;
    case 'sorpresa':
        $sorpresa = $_REQUEST["sorpresa"];
        $cajaSorpresa = new CajaSorpresa($altura, $anchura, $profundidad, $color, $sorpresa);
        $ocupacion = new Ocupacion($idEstanteria, $estante, 'sorpresa');
        $devolucion = Operaciones::insertarCajaSorpresa($cajaSorpresa, $ocupacion);
        break;
}

if ($devolucion) {
    $_SESSION['devolucion'] = "Operacion realizada con exito";
} else {
    $_SESSION['devolucion'] = "Operacion erronea";
}
header('Location:../Vista/mensaje.php');
