<!DOCTYPE html>
<?php
include '../Controlador/controladorLejasEstanteria.php';
?>
<html lang="en">
    <head>
        <script src="JS/todoJavaScript.js"></script>
    </head>

    <body>

        <form action="../Controlador/controladorRecolocarCajaFinal.php">
            <p>Tipos cajas:</p>
            <select name="" id="tipo">
                <option value="-1">Selecciona tipo</option>
                <?php
                foreach ($tipos as $tipo) {
                    echo "<option value='" . $tipo . "'>" . $tipo . "</option>";
                }
                ?>
            </select>
            <p><input type="submit"></p>
        </form>

    </body>
</html>