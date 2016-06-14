<?php

include '../DAO/Operaciones.php';

$id_estanteria = $_REQUEST["id_estanteria"];

$estantesLibres = Operaciones::obtenerEstantesLibres($id_estanteria);


$devolucion = "<select name='estanteLibre' id='estanteLibre'";
$devolucion .= "<option value='-1'>Selecciona un estante...</option>";
foreach ($estantesLibres as $numEstantes) {
    $devolucion .= "<option value='" . $numEstantes . "'>" . $numEstantes . "</option>";
}
$devolucion .= "</select>";

echo $devolucion;
