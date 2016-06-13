<!DOCTYPE html>
<?php
include '../Modelo/Estanteria.php';

session_start();
$arrayEstanterias = $_SESSION['arrayEstanterias'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Almacen cajas 2014-15</title>
        <link rel="stylesheet" type="text/css" href="../CSS/estiloListarEstanteriasTodas.css">
        <script src="JS/todoJavaScript.js?343456"></script>

    </head>


    <body>
        <div class="CSSTableGenerator">
            <table>


                <tr>

                    <th>ID</th>
                    <th>MAX</th>
                    <th>MATERIAL</th>
                    <th>PASILLO</th>
                    <th>NUMERO</th>
                    <th>OCUPADAS</th>
                </tr>


                <?php foreach ($arrayEstanterias as $fila) { ?>
                    <tr> 
                        <td ><?php echo $fila->getId(); ?>
                        </td>
                        <td ><?php echo $fila->getMax(); ?>
                        </td>  
                        <td ><?php echo $fila->getMaterial(); ?>
                        </td>  
                        <td ><?php echo $fila->getPasillo(); ?>
                        </td>    
                        <td ><?php echo $fila->getNumero(); ?>
                        </td>
                        <td ><?php echo $fila->getOcupadas(); ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>





        </div>




        <br>
        <a class="enlaceIndex" href="../index.php">Volver al inicio de la página.</a>

    </body>

</html>

