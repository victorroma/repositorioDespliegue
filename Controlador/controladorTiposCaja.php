<?php

include '../DAO/Operaciones.php';

session_start();

$codigo = $_SESSION['codigo'];
$tipos= Operaciones::obtenerTiposCaja($codigo);







