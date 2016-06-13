<!DOCTYPE html>
<?php
include '../Controlador/controladorIdEstanteria.php';
//$codigos
?>
<html lang="en">
    <head>
        <script src="JS/todoJavaScript.js"></script>
    </head>

    <body>

        <form action="../Controlador/controladorCodigoElegido.php">
            <p>Códigos de todas las estanterías:</p>
            <select name="idEstanteria" id="idEstanteria">
                <option value="-1">Selecciona su ID</option>
                <?php
                foreach ($codigos as $codigo) {
                    echo "<option value='" . $codigo[00] . "'>" . $codigo[00] . "</option>";
                }
                ?>
            </select>
            <p><input type="submit"></p>
        </form>

    </body>
</html>