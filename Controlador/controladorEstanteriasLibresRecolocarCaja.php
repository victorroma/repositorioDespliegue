<?php

include_once '../DAO/Operaciones.php';

session_start();
//GUARDAR EN SESION PARA TRATAR POSTERIORMENTE
echo $tipo = $_REQUEST['tipoDeCajaMov'];
$idEstanteria = $_REQUEST['idEstanteria'];
echo $idCajaNegra = $_REQUEST['codCajaNegra'];
$idCajaSorpresa = $_REQUEST['codCajaSorpresa'];
$idCajaFuerte = $_REQUEST['codCajaFuerte'];

$_SESSION['idEstanteriaRecolocar'] = $idEstanteria;

if ($tipo == 'f') {
    $_SESSION['idCajaRecolocar'] = $idCajaFuerte;
    $_SESSION['tipoCajaRecolocar'] = $tipo;
} else if ($tipo == 's') {
    $_SESSION['idCajaRecolocar'] = $idCajaSorpresa;
    $_SESSION['tipoCajaRecolocar'] = $tipo;
} else if ($tipo == 'n')/* negra */ {
    echo $_SESSION['idCajaRecolocar'] = $idCajaNegra;
    $_SESSION['tipoCajaRecolocar'] = $tipo;
}

$estantesLibresRecolocarCaja = Operaciones::obtenerEstantesLibres($idEstanteria);
$_SESSION['estLibRecCaj'] = $estantesLibresRecolocarCaja;

//foreach ($estantesLibresRecolocarCaja as $value) {
//    echo $value;
//}
header('Location:../Vista/recolocarCajaEnEstante.php');


