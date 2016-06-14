<?php

include_once '../DAO/Operaciones.php';

$nombre = $_REQUEST['nombre'];
$contraseña = $_REQUEST['contraseña'];

$resultado = Operaciones::login($nombre, $contraseña);

if ($resultado) {
    header('Location:../index.php');
} else {
    header('Location:../Vista/usuarioNoEncontrado.php');
}