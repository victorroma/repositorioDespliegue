<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
//$estantesLibresRec = 
         
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>Selecciona el estante de la estanteria donde desea recolocar la caja</h3>
        <form action="../Controlador/controladorTerminarRecolocacion.php" >
        <?php // echo $_SESSION['estLibRecCaj']; ?>
            <select name="estanteSeleccionado">
            <?php 
            
            $x =$_SESSION['estLibRecCaj'];
            foreach ($x as $value) {
                echo '<option>' . $value . '</option>';
            }
            
            ?>
        </select>
            
            <button type="submit">Aceptar</button>
            </form>
<?php echo $_SESSION['tipoCajaRecolocar']; ?>
    </body>
</html>
