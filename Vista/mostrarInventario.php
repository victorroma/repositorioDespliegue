<?php
include_once '../Modelo/Inventario.php';
include_once '../Modelo/EstanteriaCaja.php';

session_start();

$inventario = $_SESSION['inventario'];
//inventario ---> $fecha y $estanteriasCaja
// $estanteriasCaja ---> $cajas y $numEstante

print_r($inventario);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inventario</title>
    </head>
    <body>
        <header>
            <h2>INVENTARIO</h2>
        </header>
        <nav>
            <a href="../index.php">Volver a inicio</a>
        </nav>
        <p>

        </p>
        <section>
            <table border="black 5px solid">
                <legend> 
                    <!--poner la fecha aqui dd/mm/aaaa -->
                    <?php echo $inventario->getFecha();
                    ?>
                </legend>
                <tr>
                    <td>
                        Estanteria:
                    </td>
                    <td>
                        ID
                    </td>
                    <td>
                        max
                    </td>
                    <td>
                        material
                    </td>
                    <td>
                        pasillo
                    </td>
                    <td>
                        numero
                    </td>
                    <td>
                        ocupadas
                    </td>
                </tr>
                <?php foreach ($inventario as $estanteria) {
                    ?>
                    <tr> 
                        <td ><?php
                echo $estanteria;
                    ?>
                        </td>
                        <td ><?php echo $estanteria->getMax(); ?>
                         echo $inventario; ?>
                        </td>  
                        <td ><?php echo $estanteria->getMaterial(); ?>
                        </td>  
                        <td ><?php echo $estanteria->getPasillo(); ?>
                        </td>    
                        <td ><?php echo $estanteria->getNumero(); ?>
                        </td>
                        <td ><?php echo $estanteria->getOcupadas(); ?>
                        </td>
                    </tr>
                <?php } ?>

                <?php
                // foreach ($inventario as $estanteria) {
//     foreach ($estanteria as $caja) {
                ?>
<!--                <tr>
                    <td>
                <?php // echo 'TOSTRING====>'.$inventario->__toString(); ?>       Estanteria:
                    </td>
                    <td>
                        IDaaa
                <?php
//                        echo $invent->getEstanteriasCaja()->get;
                ?>
                    </td>
                    <td>
                        max
                <?php
//                        echo $invent->getEstanteriasCaja()->getMax();
                ?>
                    </td>
                    <td>
                        material
                <?php
//                        echo $invento->getEstanteriasCaja()->getMaterial();
                ?>
                    </td>
                    <td>
                        pasillo
                <?php
//                        echo $invent->getEstanteriasCaja()->getPasillo();
                ?>
                    </td>
                    <td>
                        numero
                <?php
//                        echo $invent->getEstanteriasCaja()->getNumero();
                ?>
                    </td>
                    <td>
                        ocupadas
                <?php
//                        echo $invent->getEstanteriasCaja()->getOcupadas();
                ?>
                    </td>
                </tr>-->

            </table>


        </section>
        <!--<footer></footer>-->
    </body>
</html>