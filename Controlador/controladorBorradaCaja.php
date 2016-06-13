<?php

include_once '../DAO/Operaciones.php';
include '../Modelo/Caja.php';
//include_once '../Modelo/CajaFuerte.php';
//include_once '../Modelo/CajaNegra.php';
//include_once '../Modelo/CajaSorpresa.php';

session_start();

$codigo = $_REQUEST['codigo'];
$tipo = Operaciones::obtenerTiposCaja($codigo);
$idEstanteria = Operaciones::obtenerIdEstanteriaPorCodCaja($codigo);
$_SESSION['idEstanteriaRecolocarCaja'] = $codigo;
$operacionDeBorrado = Operaciones::borrarCaja($codigo, $tipo, $idEstanteria);
echo $operacionDeBorrado;

//true o false segun si la query de la consulta se ha ejecutado o no
//$operacionDeBorrado = $_SESSION["resultado"];
//echo $_SESSION["resultado"];
//redireccionar a vista
//header('Location:../Vista/resultadoBorradoCaja.php');




