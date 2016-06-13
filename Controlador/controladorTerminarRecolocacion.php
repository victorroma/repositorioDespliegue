<?php

include_once '../DAO/Operaciones.php';
include_once '../Modelo/Caja.php';
include_once '../Modelo/CajaFuerte.php';
include_once '../Modelo/CajaNegra.php';
include_once '../Modelo/CajaSorpresa.php';

session_start();
//obtener estante seleccionado de estanteria para recolocar caja
echo $estanteSeleccionado = $_REQUEST['estanteSeleccionado'];

//obtener estanteria a recolocar
//$estanteriaRecolocar= 
$idEstanteria = $_SESSION['idEstanteriaRecolocar'];

//obtener cod de caja a borrar de backup
$idCajaRecolocar = $_SESSION['idCajaRecolocar'];
echo"idCajaRecolocar_____>" . $idCajaRecolocar;
//obtener tipo de caja a borrar de backup
$tipo = $_SESSION['tipoCajaRecolocar'];
echo"TIPO____>" . $tipo;


$cajaRecolocar = Operaciones::obtenerDatosCajaRecolocar($tipo, $idCajaRecolocar);


$cajaId = $cajaRecolocar->getId();
$cajaAltura = $cajaRecolocar->getAltura();
$cajaAnchura = $cajaRecolocar->getAnchura();
$cajaProfundidad = $cajaRecolocar->getProfundidad();
$cajaColor = $cajaRecolocar->getColor();

if ($tipo == 'f') {
    $propiedadCaja = $cajaRecolocar->getCodigoSeguridad();
} else if ($tipo == 'n') {
    $propiedadCaja = $cajaRecolocar->getPlaca();
} else if ($tipo == 's') {
    $propiedadCaja = $cajaRecolocar->getSorpresa();
}


echo Operaciones::recolocarCaja($cajaId, $cajaAltura, $cajaAnchura, $cajaProfundidad, $cajaColor, $propiedadCaja, $tipo, $idEstanteria, $estanteSeleccionado);

$_SESSION['devolucion'] = "Recolocacion realizada con exito";
session_reset();
//header('Location:../Vista/mensaje.php');















