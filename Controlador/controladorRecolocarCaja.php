<?php

include '../DAO/Operaciones.php';
include '../Modelo/Caja.php';
include_once '../Modelo/CajaFuerte.php';
include_once '../Modelo/CajaNegra.php';
include_once '../Modelo/CajaSorpresa.php';
session_abort();
session_start();

//obtenemos todas las estanterias con huecos libres
$arrayIdesEstanteriasLibres = Operaciones::listarEstanteriasTodas();

//obtenemos los id de cada tipo de caja
$cajasFuertesBackUp = Operaciones::obtenerBackupCajaFuerte();
$cajasNegrasBackUp = Operaciones::obtenerBackupCajaNegra();
$cajasSopresasBackUp = Operaciones::obtenerBackupCajaSopresa();

//foreach ($arrayIdesEstanteriasLibres as $caja){
//    echo "Estanteria: ".$caja->getId();
//}
//foreach ($cajasSopresasBackUp as $caja){
//    echo "iDs CAJ: ".$caja."______";
//}
//$arrayCajasNegras = array();
//Operaciones::obtenerBackupCajaNegra();
//$arrayCajasSorpresas = array();
//Operaciones::obtenerBackupCajaSorpresa();
//Pasamos a sesion los 3 arrays de backup y las idSEstanteria (4 arrays)

$_SESSION['arrayCajasFuertes'] = $cajasFuertesBackUp;
$_SESSION['arrayCajasNegras'] = $cajasNegrasBackUp;
$_SESSION['arrayCajasSopresas'] = $cajasSopresasBackUp;
$_SESSION['arrayIdesEstanteriasLibres'] = $arrayIdesEstanteriasLibres;



header('Location:../Vista/recolocarCaja.php');
