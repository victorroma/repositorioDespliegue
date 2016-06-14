<?php

include_once '../DAO/Operaciones.php';
include_once '../Modelo/Caja.php';
include_once '../Modelo/CajaFuerte.php';
include_once '../Modelo/CajaNegra.php';
include_once '../Modelo/CajaSorpresa.php';
session_abort();
session_start();


//obtenemos los id de cada tipo de caja
echo $cajasFuertes = Operaciones::obtenerCajasFuertes();
echo $cajasNegras = Operaciones::obtenerCajasNegras();
echo $cajasSopresas = Operaciones::obtenerCajasSorpresas();

echo $_SESSION['arrayCajasFuertes'] = $cajasFuertesBackUp;
echo $_SESSION['arrayCajasNegras'] = $cajasNegrasBackUp;
echo $_SESSION['arrayCajasSopresas'] = $cajasSopresasBackUp;



header('Location:../Vista/borrarCaja.php');
