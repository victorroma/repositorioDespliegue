<?php

include '../DAO/Operaciones.php';

session_start();

$codigo = $_SESSION['codigo'];
$tipo = $_REQUEST['tipo'];

$cajaPaBorrar = Operaciones::obtenerDatosCajaYOcupacion($codigo, $tipo);

$_SESSION['cajaPaBorrar'] = $cajaPaBorrar;

header('Location:../Vista/confirmarBorrado.php');
