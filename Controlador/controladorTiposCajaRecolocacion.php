<?php

include '../DAO/Operaciones.php';

session_start();
$tipo = $_REQUEST['tipo'];
$codigo = $_REQUEST['codigo'];




try {
    $datosCajaRecolocar = Operaciones::obtenerDatosCajaRecolocar($tipo, $codigo);
    
    if ($datosCajaRecolocar == false) {
        throw new CajaErroneaException("Codigo erroneo");
    }
    
    $_SESSION["datosCajaRecolocar"]=$datosCajaRecolocar;
    header('Location:../Vista/confirmarCajaRecolocar.php');
    
} catch (CajaErroneaException $exc) {
    
    header('Location:../Vista/error.php');
}


