<?php

include_once '../DAO/Operaciones.php';
include_once '../Modelo/Ocupacion.php';
include_once '../Modelo/Caja.php';
include_once '../Modelo/CajaSorpresa.php';
include_once '../Modelo/CajaFuerte.php';
include_once '../Modelo/CajaNegra.php';

session_start();
$cajaPaBorrar = $_SESSION['cajaPaBorrar'];

$ocupacion = $cajaPaBorrar[0];
$caja = $cajaPaBorrar[1];

$resultado = Operaciones::borrarCaja($caja->getId(), $ocupacion->getTipo());

$_SESSION['resultado'] = $resultado;

header('Location:../Vista/resultadoBorradoCaja.php');
