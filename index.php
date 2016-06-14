<!DOCTYPE html>
<?php
include 'Controlador/controladorEstanteriasLibres.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Almacen cajas 2014-15</title>
        <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
        <script src="JS/todoJavaScript.js?6565456676546764"></script>
    </head>

    <body>

        <header class="encabezado">
<!--            LOGO ->HEADER esto sera comentado-->
<p>Se ha añadido</p>
        </header>
        <nav class="barraNav">
            Gestion general -->NAV
            <p>Esta será la modificacion que haremos en forma de parrafo</p>
            <p>Modificacion que haremos desde NetBeans</p>
        </nav>


        <aside>
            <!-- DE MOMENTO VACIO-->
        </aside>



        <section class="tresContenedores" id="seccionUno">
            <header><h3>Almacén</h3></header>
            <article class="formularioTresContenedores">

                <p>Listar todas las estanterias</p>
                <form action="Controlador/controladorEstanteriaListarTodas.php">
                    <input type="submit">
                </form>
                
                
                <p>Inventario</p>
                <form action="Controlador/controladorInventario.php">
                    <input type="submit">
                </form>


                <p>Borrar caja</p>
                <form action="Controlador/controladorBorrarCaja.php">
                    <input type="submit">
                </form>

                
                <p>Recolocar caja</p>
                <form action="Controlador/controladorRecolocarCaja.php">
                    <input type="submit">
                </form>


                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <p>Mostrar estanteria por pasillo y numero introducidos</p>
                <p>Mostrar estanteria por id introducido</p>
                <p>Borrar tabla y almacenar las cajas en una tabla auxiliar y desde esa tabla distribuirlas por unas estanterias especificas</p>
            </article>
            <footer></footer>
            
            
        </section>  

        <section class="tresContenedores" id="seccionDos">
            <header><h3>Estantería</h3></header>
            <article class="formularioTresContenedores">
                <form action="Controlador/controladorEstanteriaInsertar.php">
                    <p>Nueva estantería</p>
                    <p>Número de lejas:</p>
                    <p><input type="text" name="numLejas"></p>
                    <select name="material" id="material">
                        <option value="-1">Selecciona un material</option>
                        <option value="madera">Madera</option>
                        <option value="acero">Acero</option>
                        <option value="Aluminio">Aluminio</option>
                    </select>

                    <p>Localizacion en el almacen:</p>
                    <p>Pasillo</p>
                    <select name="pasillo" id="pasillo">
                        <option value="-1">Selecciona pasillo</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                    </select>
                    <p>Numero: </p>
                    <select name="numero" id="numero">
                        <option value="-1">Selecciona numero</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    <p><input type="submit"></p>
                </form>


            </article>
            <footer></footer>
        </section>  

        <section class="tresContenedores" id="seccionTres">
            <header><h3>Caja</h3></header>
            <article class="formularioTresContenedores">
                <form action="Controlador/controladorCajaInsertar.php">
                    <p>Altura:</p>
                    <input type="text" name="altura">
                    <p>Anchura:</p>
                    <input type="text" name="anchura">
                    <p>Profundidad:</p>
                    <input type="text" name="profundidad">
                    <p>Color:</p>
                    <input type="text" name="color">
                    <p>Tipo:</p>
                    <select name="tipo" id="tipo" onchange='mostrarCaja(this.value)'>
                        <option value="-1">Selecciona un tipo de caja</option>
                        <option value="sorpresa">Sorpresa varchar</option>
                        <option value="fuerte">Fuerte varchar</option>
                        <option value="negra">Negra varchar</option>
                    </select>
                    <div id="campoSorpresa" style="display: none">
                        <input type="text" name="sorpresa">
                    </div>

                    <div id="campoNegra" style="display: none">
                        <input type="text" name="placa">
                    </div>

                    <div id="campoFuerte" style="display: none">
                        <input type="text" name="codigoSeguridad">
                    </div>


                    <p>Código estantería:</p>
                    <select name="codigo" id="codigo" onchange="obtenerEstantesLibres(this.value)">
                        <option value="-1">Selecciona estanteria</option>
                        <?php
                        foreach ($estanterias as $estanteria) {
                            echo "<option value='" . $estanteria->getId() . "'>Estanteria " . $estanteria->getPasillo() . $estanteria->getNumero() . "</option>";
                        }
                        ?>
                    </select>
                    <div id="ESTANTESLIBRES" >
                    </div>
                        

                    <p><input type="submit"></p>



                </form>
            </article>
            <footer></footer>
        </section>  


        <footer class="piePag" >
            Pie de pagina...
        </footer>

    </body>
</html>
