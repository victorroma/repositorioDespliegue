<?php

//INSERTAR ESTANTERIA
include_once '../Modelo/Estanteria.php';
include_once '../DAO/Operaciones.php';
session_start();


$numlejas = $_REQUEST["numLejas"];
$material = $_REQUEST["material"];
$pasillo = $_REQUEST["pasillo"];
$numero = $_REQUEST["numero"];

$estanteria = new Estanteria($numlejas, $material, $pasillo, $numero);

$devolucion = Operaciones::insertaEstanteria($estanteria);

if ($devolucion) {
    $_SESSION['devolucion'] = "Operacion realizada con exito";
} else {
    $_SESSION['devolucion'] = "Operacion erronea";
}

header('Location:../Vista/mensaje.php');
