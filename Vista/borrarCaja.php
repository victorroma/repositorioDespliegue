<!DOCTYPE html>
<?php
include '../Modelo/Estanteria.php';
//include_once '../Modelo/Caja.php';
//include_once '../Modelo/CajaFuerte.php';
//include_once '../Modelo/CajaNegra.php';
//include_once '../Modelo/CajaSorpresa.php';
session_start();
$arrayCajasFuerte = $_SESSION['arrayCajasFuertes'];
$arrayCajasNegras = $_SESSION['arrayCajasNegras'];
$arrayCajasSorpresas = $_SESSION['arrayCajasSopresas'];


$arrayIdesEstanteriasLibres = $_SESSION['arrayIdesEstanteriasLibres']
?>

<html lang="en">
    <head>
        <script src="JS/todoJavaScript.js"></script>
    </head>

    <body>

        <form action="../Controlador/controladorEstanteriasLibresRecolocarCaja.php">
<!--            <p>Tipos cajas:</p>
            <select name="tipo" id="tipo">
                <option value="-1">Selecciona tipo</option>
                <option value="s">Sorpresa</option>
                <option value="n">Negra</option>
                <option value="f">Fuerte</option>
                
            </select>
            
            Codigo caja:<input type="number" name="codigo" min="1">-->
            <h3>Tipo de caja a recolocar</h3>
            <select name="tipoDeCajaMov">
                <option value="f">Caja fuerte</option>
                <option value="n">Caja negra</option>
                <option value="s">Caja sorpresa</option>
            </select>
            <?php
//            print_r($_SESSION['arrayCajasNegras']);
            ?>

            <h3>Codigos de cajas negras:</h3>
            <select name="codCajaNegra">
                <?php
                foreach ($arrayCajasNegras as $caj) {
                    echo "<option>" . $caj . "</option>";
                }
                ?>
            </select>

            <h3>Codigos de cajas sorpresas:</h3>
            <select name="codCajaSorpresa">
                <?php
                foreach ($arrayCajasSorpresas as $caj) {
                    echo "<option>" . $caj . "</option>";
                }
                ?>
            </select>

            <h3>Codigos de cajas fuertes:</h3>
            <select name="codCajaFuerte">
                <?php
                foreach ($arrayCajasFuerte as $caj) {
                    echo "<option>" . $caj . "</option>";
                }
                ?>
            </select>
            <br>


            <p><input type="submit"></p>
        </form>

    </body>
</html>