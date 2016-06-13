<?php

//LISTAR TODAS LAS ESTANTERIAS
include_once '../DAO/Operaciones.php';

session_start();

$arrayEstanterias = Operaciones::listarEstanteriasTodas();
$_SESSION['arrayEstanterias'] = $arrayEstanterias;

header('Location:../Vista/listadoEstanteriasTodas.php');
