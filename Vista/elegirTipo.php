<!DOCTYPE html>
<?php
include '../Controlador/controladorTiposCaja.php';
?>
<html lang="en">
    <head>
        <script src="JS/todoJavaScript.js"></script>
    </head>

    <body>

        <form action="../Controlador/controladorObtenerCaja.php">
            <p>Tipos cajas:</p>
            <select name="tipo" id="tipo">
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

