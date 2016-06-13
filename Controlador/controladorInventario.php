<?php

include_once '../DAO/Operaciones.php';
include_once '../Modelo/EstanteriaCaja.php';


session_start();

$inventario = Operaciones::obtenerInventario();
$_SESSION['inventario'] = $inventario;

header('Location:../Vista/mostrarInventario.php');

