<?php
session_start();
//$_SESSION["resultado"] = TRUE;
$resultado = $_SESSION["resultado"]; //error de variable de sesion
if ($resultado) {
    echo "La caja se ha borrado<br>";
} else {
    echo "La caja no se ha borrado<br>";
}
?>
<a href="../index.php">Volver a inicio de la página</a>