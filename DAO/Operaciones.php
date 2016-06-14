<?php

include 'Conexion.php';

class Operaciones {

    static function insertaEstanteria($estanteria) {
        global $conexion;

        $MAX = $estanteria->getMax();
        $MATERIAL = $estanteria->getMaterial();
        $PASILLO = $estanteria->getPasillo();
        $NUMERO = $estanteria->getNumero();
        $OCUPADOS = $estanteria->getOcupadas();


        $query = "INSERT INTO estanteria VALUES (default, $MAX, '$MATERIAL' , '$PASILLO', $NUMERO ,$OCUPADOS)";
        $res = mysqli_query($conexion, $query);

        return $res;
    }

    static function listarEstanteriasTodas() {
        include_once '../Modelo/Estanteria.php';
        global $conexion;
        $array = Array();
        $res = mysqli_query($conexion, "SELECT * FROM estanteria");
        foreach ($res as $fila) {
            $objetoEstanteria = new Estanteria($fila['MAX'], $fila['MATERIAL'], $fila['PASILLO'], $fila['NUMERO'], $fila['OCUPADAS']);
            $objetoEstanteria->setId($fila['ID']);
            $array[] = $objetoEstanteria;
        }
        return $array;
    }

    static function obtenerCajasFuertes() {
        include_once '../Modelo/Estanteria.php';
        global $conexion;
        $array = Array();
        $res = mysqli_query($conexion, "SELECT DISTINCT ID FROM CAJAFUERTE ");
        foreach ($res as $fila) {
            $array[] = $fila['ID'];
        }
        return $array;
    }

    static function obtenerCajasSorpresas() {
        include_once '../Modelo/Estanteria.php';
        global $conexion;
        $array = Array();
        $res = mysqli_query($conexion, "SELECT DISTINCT ID FROM CAJASORPRESA ");
        foreach ($res as $fila) {
            $array[] = $fila['ID'];
        }
        return $array;
    }

    static function obtenerCajasNegras() {
        include_once '../Modelo/Estanteria.php';
        global $conexion;
        $array = Array();
        $res = mysqli_query($conexion, "SELECT DISTINCT ID FROM CAJANEGRA ");
        foreach ($res as $fila) {
            $array[] = $fila['ID'];
        }
        return $array;
    }

    static function obtenerBackupCajaFuerte() {
        include_once '../Modelo/Estanteria.php';
        global $conexion;
        $array = Array();
        $res = mysqli_query($conexion, "SELECT DISTINCT ID FROM CAJAFUERTE_BACKUP ");
        foreach ($res as $fila) {
            $array[] = $fila['ID'];
        }
        return $array;
    }

    static function obtenerBackupCajaNegra() {
        include_once '../Modelo/Estanteria.php';
        global $conexion;
        $array = Array();
        $res = mysqli_query($conexion, "SELECT DISTINCT ID FROM CAJANEGRA_BACKUP ");
        foreach ($res as $fila) {
            $array[] = $fila['ID'];
        }
        return $array;
    }

    static function obtenerBackupCajaSopresa() {
        include_once '../Modelo/Estanteria.php';
        global $conexion;
        $array = Array();
        $res = mysqli_query($conexion, "SELECT DISTINCT ID FROM CAJASORPRESA_BACKUP ");
        foreach ($res as $fila) {
            $array[] = $fila['ID'];
        }
        return $array;
    }

    static function obtenerEstanteriasLibres() {
        include_once 'Modelo/Estanteria.php';
        global $conexion;
        $array = Array();
        $res = mysqli_query($conexion, "SELECT * FROM ESTANTERIA WHERE estanteria.MAX > estanteria.OCUPADAS order by pasillo, numero ASC;");
        foreach ($res as $fila) {
            $objetoEstanteria = new Estanteria($fila['MAX'], $fila['MATERIAL'], $fila['PASILLO'], $fila['NUMERO'], $fila['OCUPADAS']);
            $objetoEstanteria->setId($fila['ID']);
            $array[] = $objetoEstanteria;
        }
        return $array;
    }

    //INSERTAR CAJAS
    static function insertarCajaFuerte($caja, $ocupacion) {
        include_once '../Modelo/Caja.php';
        include_once '../Modelo/CajaFuerte.php';
        include_once '../Modelo/Ocupacion.php';

        global $conexion;

        //DATOS DE CAJANEGRA
        $altura = $caja->getAltura();
        $anchura = $caja->getAnchura();
        $profundidad = $caja->getProfundidad();
        $color = $caja->getColor();
        $codigoSeguridad = $caja->getCodigoSeguridad();

        //OCUPACION RECIBIDA POR PARAMETRO
        $idEstanteria = $ocupacion->getIdEstanteria();


        $conexion->autocommit(false);

        //INSERCION DE CAJAFUERTE
        $query = "INSERT "
                . "INTO CAJAFUERTE "
                . "VALUES (default, $altura,$anchura,$profundidad,'$color','$codigoSeguridad')";
        $exito = mysqli_query($conexion, $query);
        echo "---Q>" . $query;
        echo "--E>" . $exito;
        $idCaja = mysqli_insert_id($conexion);

        //MODIFICACION DE LAS OCUPADAS EN ESTANTERIA
        if ($exito) {
            $query = "UPDATE "
                    . "ESTANTERIA "
                    . "SET OCUPADAS = OCUPADAS + 1 "
                    . "WHERE ID = $idEstanteria";
            $exito = mysqli_query($conexion, $query);
            echo "---Q>" . $query;
            echo "--E>" . $exito;
            if ($exito) {
                $estante = $ocupacion->getnEstante();
                $tipo = 'fuerte';


                //INSERCION DE DATOS EN OCUPACION 
                $query = "INSERT "
                        . "INTO OCUPACION "
                        . "VALUES ($idEstanteria, $estante,  $idCaja,'$tipo');";
                $exito = mysqli_query($conexion, $query);
                echo "---Q>" . $query;
                echo "-->" . $exito;
            }
        }

        if ($exito) {
            $conexion->commit();
        } else {
            $conexion->rollback();
        }

        return $exito;
    }

    static function insertarCajaNegra($caja, $ocupacion) {
        include_once '../Modelo/Caja.php';
        include_once '../Modelo/CajaNegra.php';
        include_once '../Modelo/Ocupacion.php';

        global $conexion;

        //DATOS DE CAJANEGRA
        $altura = $caja->getAltura();
        $anchura = $caja->getAnchura();
        $profundidad = $caja->getProfundidad();
        $color = $caja->getColor();
        $placa = $caja->getPlaca();

        //OCUPACION RECIBIDA POR PARAMETRO
        $idEstanteria = $ocupacion->getIdEstanteria();


        $conexion->autocommit(false);

        //INSERCION DE CAJAFUERTE
        $query = "INSERT "
                . "INTO CAJANEGRA "
                . "VALUES (default, $altura,$anchura,$profundidad,'$color','$placa')";
        $exito = mysqli_query($conexion, $query);

        //MODIFICACION DE LAS OCUPADAS EN ESTANTERIA
        if ($exito) {
            $query = "UPDATE "
                    . "ESTANTERIA "
                    . "SET OCUPADAS = OCUPADAS + 1 "
                    . "WHERE ID = $idEstanteria";
            $exito = mysqli_query($conexion, $query);
            echo "---Q>" . $query;
            echo "--E>" . $exito;
            if ($exito) {
                $estante = $ocupacion->getnEstante();
                $tipo = 'negra';
                $idCaja = mysqli_insert_id($conexion);

                //INSERCION DE DATOS EN OCUPACION 
                $query = "INSERT "
                        . "INTO OCUPACION "
                        . "VALUES ($idEstanteria, $estante,  $idCaja,'$tipo')";
                $exito = mysqli_query($conexion, $query);
                echo "---Q>" . $query;
                echo "-->" . $exito;
            }
        }

        if ($exito) {
            $conexion->commit();
        } else {
            $conexion->rollback();
        }

        return $exito;
    }

    //Y SUMA EL NUMERO DE LEJAS OCUPADAS EN LA ESTANTERIA EN LA QUE SE 
    //INTRODUCE LA CAJA
    static function insertarCajaSorpresa($caja, $ocupacion) {
        include_once '../Modelo/Caja.php';
        include_once '../Modelo/CajaSorpresa.php';
        include_once '../Modelo/Ocupacion.php';

        global $conexion;

        //DATOS DE CAJANEGRA
        $altura = $caja->getAltura();
        $anchura = $caja->getAnchura();
        $profundidad = $caja->getProfundidad();
        $color = $caja->getColor();
        $sorpresa = $caja->getSorpresa();

        //OCUPACION RECIBIDA POR PARAMETRO
        $idEstanteria = $ocupacion->getIdEstanteria();


        $conexion->autocommit(false);

        //INSERCION DE CAJAFUERTE
        $query = "INSERT "
                . "INTO CAJASORPRESA "
                . "VALUES (default, $altura,$anchura,$profundidad,'$color','$sorpresa')";
        $exito = mysqli_query($conexion, $query);

        //MODIFICACION DE LAS OCUPADAS EN ESTANTERIA
        if ($exito) {
            $query = "UPDATE "
                    . "ESTANTERIA "
                    . "SET OCUPADAS = OCUPADAS + 1 "
                    . "WHERE ID = $idEstanteria";
            $exito = mysqli_query($conexion, $query);
            echo "---Q>" . $query;
            echo "--E>" . $exito;
            if ($exito) {
                $estante = $ocupacion->getnEstante();
                $tipo = 'sorpresa';
                $idCaja = mysqli_insert_id($conexion);

                //INSERCION DE DATOS EN OCUPACION 
                $query = "INSERT "
                        . "INTO OCUPACION "
                        . "VALUES ($idEstanteria, $estante,  $idCaja,'$tipo')";
                $exito = mysqli_query($conexion, $query);
                echo "---Q>" . $query;
                echo "-->" . $exito;
            }
        }

        if ($exito) {
            $conexion->commit();
        } else {
            $conexion->rollback();
        }

        return $exito;
    }

    static function obtenerInventario() {
        global $conexion;
        include_once '../Modelo/Caja.php';
        include_once '../Modelo/CajaSorpresa.php';
        include_once '../Modelo/CajaFuerte.php';
        include_once '../Modelo/CajaSorpresa.php';
        include_once '../Modelo/Inventario.php';


        $estanteriasCaja = Array();
        $query = "SELECT * FROM ESTANTERIA";

        $registrosEstanterias = $conexion->query($query);

        foreach ($registrosEstanterias as $filaEstanteria) {

            $id = $filaEstanteria['ID'];

            $cajas = Array();
            $numEstantes = Array();

            $query = "SELECT "
                    . "CAJASORPRESA.*, OCUPACION.N_ESTANTE "
                    . "FROM CAJASORPRESA, OCUPACION  "
                    . "WHERE CAJASORPRESA.ID = OCUPACION.ID_CAJA "
                    . "AND OCUPACION.TIPO='sorpresa' "
                    . "AND OCUPACION.ID_ESTANTERIA =$id";

            $registrosCajas = $conexion->query($query);
            foreach ($registrosCajas as $filaCaja) {
                $caja = new CajaSorpresa($filaCaja['ALTURA'], $filaCaja['ANCHURA'], $filaCaja['PROFUNDIDAD'], $filaCaja['COLOR'], $filaCaja['SORPRESA']);
                $cajas[] = $caja;
                $numEstantes[] = $filaCaja['N_ESTANTE'];
            }

            $query = "SELECT "
                    . "CAJAFUERTE.*, OCUPACION.N_ESTANTE "
                    . "FROM CAJAFUERTE, OCUPACION  "
                    . "WHERE CAJAFUERTE.ID = OCUPACION.ID_CAJA "
                    . "AND OCUPACION.TIPO='fuerte' "
                    . "AND OCUPACION.ID_ESTANTERIA =$id";

            $registrosCajas = $conexion->query($query);
            foreach ($registrosCajas as $filaCaja) {
                $caja = new CajaSorpresa($filaCaja['ALTURA'], $filaCaja['ANCHURA'], $filaCaja['PROFUNDIDAD'], $filaCaja['COLOR'], $filaCaja['CODIGO_SEGURIDAD']);
                $cajas[] = $caja;
                $numEstantes[] = $filaCaja['N_ESTANTE'];
            }

            $query = "SELECT "
                    . "CAJANEGRA.*, OCUPACION.N_ESTANTE "
                    . "FROM CAJANEGRA, OCUPACION  "
                    . "WHERE CAJANEGRA.ID = OCUPACION.ID_CAJA "
                    . "AND OCUPACION.TIPO='negra' "
                    . "AND OCUPACION.ID_ESTANTERIA =$id";

            $registrosCajas = $conexion->query($query);
            foreach ($registrosCajas as $filaCaja) {
                $caja = new CajaSorpresa($filaCaja['ALTURA'], $filaCaja['ANCHURA'], $filaCaja['PROFUNDIDAD'], $filaCaja['COLOR'], $filaCaja['PLACA']);
                $cajas[] = $caja;
                $numEstantes[] = $filaCaja['N_ESTANTE'];
            }


            $objetoEstanteria = new EstanteriaCaja($filaEstanteria['MAX'], $filaEstanteria['MATERIAL'], $filaEstanteria['PASILLO'], $filaEstanteria['NUMERO'], $cajas, $numEstantes);
            $estanteriasCaja[] = $objetoEstanteria;
        }

        $fecha = date("d-m-Y");
        return new Inventario($fecha, $estanteriasCaja);
    }

    static function obtenerEstantesLibres($id_estanteria) {
        global $conexion;
        // El total de numeros => MAX
        $query = "SELECT MAX FROM ESTANTERIA WHERE ID = $id_estanteria";
        $maxEstantes = mysqli_query($conexion, $query);
        $row = mysqli_fetch_array($maxEstantes);
        $MAX = $row[0];

        $estantesLibres = Array();
        for ($i = 0; $i < $MAX; $i++) {

            $EstanteLibre = true;

            // Los numeros ocupados
            $query = "SELECT N_ESTANTE FROM OCUPACION WHERE ID_ESTANTERIA = $id_estanteria";
            $estantesOcupados = mysqli_query($conexion, $query);

            $estanteOcupado = mysqli_fetch_array($estantesOcupados);
            while ($estanteOcupado != null) {
                if ($estanteOcupado['N_ESTANTE'] == $i) {
                    $EstanteLibre = false;
                }

                $estanteOcupado = mysqli_fetch_array($estantesOcupados);
            }

            if ($EstanteLibre == true) {
                $estantesLibres[] = $i;
            }
        }

        return $estantesLibres;
    }

    static function obtenerCodigosCaja() {
        global $conexion;
        $array = Array();
        $res = mysqli_query($conexion, "SELECT DISTINCT ID_CAJA FROM OCUPACION");
        foreach ($res as $fila) {
            $array[] = $fila['ID_CAJA'];
        }
        return $array;
    }

    static function obtenerIdEstanteria() {
        global $conexion;
        $array = Array();
        $res = mysqli_query($conexion, "SELECT DISTINCT ID_ESTANTERIA FROM OCUPACION");
        foreach ($res as $fila) {
            $array[] = $fila['ID_ESTANTERIA'];
        }
        return $array;
    }

    static function obtenerIdEstanteriaPorCodCaja($idCaja) {
        global $conexion;
        $idEstanteria = "";
        $res = mysqli_query($conexion, "SELECT ID_ESTANTERIA  FROM OCUPACION where "
                . "id_caja=$idCaja");
        foreach ($res as $fila) {
            $idEstanteria = $fila['ID_ESTANTERIA'];
        }
        return $idEstanteria;
    }

//    static function obtenerCodigosCajasBorradas ($tipo) {
//        global $conexion;
//        $array = Array();
//        
//    
//
//
//        switch ($tipo) {
//            case 's':
//                $query = "SELECT * FROM CAJASORPRESA_BACKUP";
//                $res = mysqli_query($conexion, $query);
//                $result = mysqli_fetch_array($res);
//                $objCajaSorpresa = new objetoCreadoEnClase($res[''], $res[''], $res[''], $res[''], $res[''], $res[''], $res[''], $res[''], $res['']);
//
//
////                $query = "SELECT * FROM OCUPACION WHERE ID_CAJA=$codigo AND TIPO='$tipo'";
////                //$ocupaciones = mysqli_query($conexion, $query);
////                $ocupacion = mysqli_fetch_array($ocupaciones); // Solo hacemos una vez esta operacion PORQUE SABEMOS que nos viene UN RESULTADO SI O SI
////                $objOcupacion = new Ocupacion($ocupacion['ID_ESTANTERIA'], $ocupacion['N_ESTANTE'], $ocupacion['TIPO'], $ocupacion['ID_CAJA']);
////                $datosOcupacionYCaja[0] =
//        }
//    }

    static function obtenerTiposCaja($codigoReciv) {
        global $conexion;
        $array = Array();
        $res = mysqli_query($conexion, "SELECT DISTINCT TIPO FROM OCUPACION "
                . " WHERE ID_CAJA='$codigoReciv'");
        foreach ($res as $fila) {
            $array[] = $fila['TIPO'];
        }
        return $array;
    }

    //segun el tipo switch te tiene que llevar a la tabla de la caja
    static function obtenerDatosCajaYOcupacion($codigo, $tipo) {
        global $conexion;
        include_once '../Modelo/Ocupacion.php';
        include_once '../Modelo/Caja.php';
        include_once '../Modelo/CajaSorpresa.php';
        include_once '../Modelo/CajaFuerte.php';
        include_once '../Modelo/CajaNegra.php';

        switch ($tipo) {
            case ("sorpresa"):

                $query = "SELECT * FROM OCUPACION WHERE ID_CAJA=$codigo AND TIPO='$tipo'";
                $ocupaciones = mysqli_query($conexion, $query);
                $ocupacion = mysqli_fetch_array($ocupaciones); // Solo hacemos una vez esta operacion PORQUE SABEMOS que nos viene UN RESULTADO SI O SI
                $objOcupacion = new Ocupacion($ocupacion['ID_ESTANTERIA'], $ocupacion['N_ESTANTE'], $ocupacion['TIPO'], $ocupacion['ID_CAJA']);
                $datosOcupacionYCaja[0] = $objOcupacion;

                $query = "SELECT * FROM CAJASORPRESA WHERE ID=$codigo";
                $cajas = mysqli_query($conexion, $query);
                $caja = mysqli_fetch_array($cajas); // Solo hacemos una vez esta operacion PORQUE SABEMOS que nos viene UN RESULTADO SI O SI
                $objCaja = new CajaSorpresa($caja['ALTURA'], $caja['ANCHURA'], $caja['PROFUNDIDAD'], $caja['COLOR'], $caja['SORPRESA']);
                $objCaja->setId($caja['ID']);
                $datosOcupacionYCaja[1] = $objCaja;

                return $datosOcupacionYCaja;

            case("negra"):
                $query = "SELECT * FROM OCUPACION WHERE ID_CAJA=$codigo AND TIPO='$tipo'";
                $ocupaciones = mysqli_query($conexion, $query);
                $ocupacion = mysqli_fetch_array($ocupaciones); // Solo hacemos una vez esta operacion PORQUE SABEMOS que nos viene UN RESULTADO SI O SI
                $objOcupacion = new Ocupacion($ocupacion['ID_ESTANTERIA'], $ocupacion['N_ESTANTE'], $ocupacion['TIPO'], $ocupacion['ID_CAJA']);
                $datosOcupacionYCaja[0] = $objOcupacion;
                print_r($objOcupacion);
                $query = "SELECT * FROM CAJANEGRA WHERE ID=$codigo";
                $cajas = mysqli_query($conexion, $query);
                $caja = mysqli_fetch_array($cajas); // Solo hacemos una vez esta operacion PORQUE SABEMOS que nos viene UN RESULTADO SI O SI
                $objCaja = new CajaNegra($caja['ALTURA'], $caja['ANCHURA'], $caja['PROFUNDIDAD'], $caja['COLOR'], $caja['PLACA']);
                $objCaja->setId($caja['ID']);
                $datosOcupacionYCaja[1] = $objCaja;

                return $datosOcupacionYCaja;

            case("fuerte"):
                $query = "SELECT * FROM OCUPACION WHERE ID_CAJA=$codigo AND TIPO='$tipo'";
                $ocupaciones = mysqli_query($conexion, $query);
                $ocupacion = mysqli_fetch_array($ocupaciones); // Solo hacemos una vez esta operacion PORQUE SABEMOS que nos viene UN RESULTADO SI O SI
                $objOcupacion = new Ocupacion($ocupacion['ID_ESTANTERIA'], $ocupacion['N_ESTANTE'], $ocupacion['TIPO'], $ocupacion['ID_CAJA']);
                $datosOcupacionYCaja[0] = $objOcupacion;

                $query = "SELECT * FROM CAJAFUERTE WHERE ID=$codigo";
                $cajas = mysqli_query($conexion, $query);
                $caja = mysqli_fetch_array($cajas); // Solo hacemos una vez esta operacion PORQUE SABEMOS que nos viene UN RESULTADO SI O SI
                $objCaja = new CajaFuerte($caja['ALTURA'], $caja['ANCHURA'], $caja['PROFUNDIDAD'], $caja['COLOR'], $caja['CODIGO_SEGURIDAD']);
                $objCaja->setId($caja['ID']);
                $datosOcupacionYCaja[1] = $objCaja;

                return $datosOcupacionYCaja;
        }
    }

    static function borrarCaja($codigo, $tipo, $idEstanteria) {
        global $conexion;
        include_once '../Modelo/Ocupacion.php';
        include_once '../Modelo/CajaSorpresa.php';
        include_once '../Modelo/CajaFuerte.php';
        include_once '../Modelo/CajaNegra.php';

        $a = Operaciones::obtenerDatosCajaYOcupacion($codigo, $tipo);
        switch ($tipo) {
            case ('fuerte'):
                $query = "DELETE FROM CAJAFUERTE WHERE "
                        . "ID=$codigo";
                mysqli_query($conexion, $query);

                $query = "UPDATE "
                        . "ESTANTERIA "
                        . "SET OCUPADAS = OCUPADAS - 1 "
                        . "WHERE ID = $idEstanteria";
                mysqli_query($conexion, $query);

                return mysqli_query($conexion, $query);

            case ('negra'):
                $query = "DELETE FROM CAJANEGRA WHERE "
                        . "ID=$codigo";
                $query = "UPDATE "
                        . "ESTANTERIA "
                        . "SET OCUPADAS = OCUPADAS - 1 "
                        . "WHERE ID = $idEstanteria";
                mysqli_query($conexion, $query);

                return mysqli_query($conexion, $query);
            case('sorpresa'):
                $query = "DELETE FROM CAJASORPRESA WHERE "
                        . "ID=$codigo";
                $query = "UPDATE "
                        . "ESTANTERIA "
                        . "SET OCUPADAS = OCUPADAS - 1 "
                        . "WHERE ID = $idEstanteria";
                mysqli_query($conexion, $query);

                return mysqli_query($conexion, $query);
        }
    }

    static function login($nombre, $contraseña) {
        global $conexion;
        $sql = "SELECT COUNT(*) FROM USUARIO  WHERE nombre ='$nombre' AND contra=AES_ENCRYPT('$contraseña','Victor')";
        $resultados = mysqli_query($conexion, $sql);
        $resultado = mysqli_fetch_array($resultados);
        $valor = $resultado[0];

        if ($valor == 1) {
            return true;
        } else {
            return false;
        }
    }

    static function obtenerDatosCajaRecolocar($tipo, $codigo) {
        global $conexion;
        include_once '../Modelo/Caja.php';
        include_once '../Modelo/CajaFuerte.php';
        include_once '../Modelo/CajaNegra.php';
        include_once'../Modelo/CajaSorpresa.php';

        switch ($tipo) {
            case 'n':
                $query = "SELECT * from CAJANEGRA_BACKUP WHERE ID=$codigo;";
                $SQLq = mysqli_query($conexion, $query);
//                $aux = mysqli_num_rows($cajas);
                foreach ($SQLq as $value) {
                    $cajadevuelta = new CajaNegra($value["ALTURA"], $value["ANCHURA"], $value["PROFUNDIDAD"], $value["COLOR"], $value["PLACA"]);
                    $cajadevuelta->setId($value["ID"]);
                    return $cajadevuelta;
                }
            case 's':
                $query = "SELECT * from CAJASORPRESA_BACKUP WHERE ID=$codigo;";
                $SQLq = mysqli_query($conexion, $query);
//                $aux = mysqli_num_rows($cajas);
                foreach ($SQLq as $value) {
                    $cajadevuelta = new CajaSorpresa($value["ALTURA"], $value["ANCHURA"], $value["PROFUNDIDAD"], $value["COLOR"], $value["SORPRESA"]);
                    $cajadevuelta->setId($value["ID"]);
                    return $cajadevuelta;
                }
            case 'f' :
                $query = "SELECT * from CAJAFUERTE_BACKUP WHERE ID=$codigo;";
                $SQLq = mysqli_query($conexion, $query);
//                $aux = mysqli_num_rows($cajas);
                foreach ($SQLq as $value) {
                    $cajadevuelta = new CajaFuerte($value["ALTURA"], $value["ANCHURA"], $value["PROFUNDIDAD"], $value["COLOR"], $value["CODIGO_SEGURIDAD"]);
                    $cajadevuelta->setId($value["ID"]);
                    return $cajadevuelta;
                }

            default:
                break;
        }

//        if ($aux != 0) {
//            return false;
//        }else{
//            return $cajadevuelta;
//        }
    }

    static function recolocarCaja($cajaId, $cajaAltura, $cajaAnchura, $cajaProfundidad, $cajaColor, $cajaPropiedad, $tipoCaja, $idEstanteria, $nEstante) {
        global $conexion;

        include_once '../Modelo/Caja.php';
        include_once '../Modelo/CajaFuerte.php';
        include_once '../Modelo/CajaNegra.php';
        include_once'../Modelo/CajaSorpresa.php';
        $conexion->autocommit(false);
        if ($tipoCaja == 'f') {
            $tipoCaja = "fuerte";
        } else if ($tipoCaja == 's') {
            $tipoCaja = 'sorpresa';
        } else if ($tipoCaja == 'n') {
            $tipoCaja = 'negra';
        }

        switch ($tipoCaja) {
            //Borrar Caja de BACKUP OK        
            //Insertar la caja en el estante de la estanteria seleccionado en la vista 
            //anterior--> recolocarCajaEnEstante OK
            //Modificar ocupacion OK
            case "fuerte":
                $cajaFuerte = new CajaFuerte($cajaAltura, $cajaAnchura, $cajaProfundidad, $cajaColor, $cajaPropiedad);

                $query1 = "DELETE FROM CAJAFUERTE_BACKUP WHERE ID=$cajaId";
                $SQLq1 = mysqli_query($conexion, $query1);


                $query2 = "INSERT INTO CAJAFUERTE VALUES ($cajaId,$cajaAltura,$cajaAnchura, $cajaProfundidad, '$cajaColor', '$cajaPropiedad' );";
                $SQLq2 = mysqli_query($conexion, $query2);

                $query3 = "UPDATE ESTANTERIA SET OCUPADAS = OCUPADAS + 1 WHERE ID = $idEstanteria";
                $SQLq3 = mysqli_query($conexion, $query3);

                $query4 = "INSERT INTO OCUPACION VALUES ($idEstanteria,$nEstante,$cajaId,'fuerte');";
                $SQLq4 = mysqli_query($conexion, $query4);

                if ($query1 && $query2 && $query3 && $query4) {
                    $conexion->commit();
                    return true;
                } else {
                    $conexion->rollback();
                }
//                return $query1." ____  ".$query2." ____  ".$query3." ____  ".$query4;
            //Borrar Caja de BACKUP OK        
            //Insertar la caja en el estante de la estanteria seleccionado en la vista 
            //anterior--> recolocarCajaEnEstante OK
            //Modificar ocupacion OK
            case "negra":
                $cajaFuerte = new CajaFuerte($cajaAltura, $cajaAnchura, $cajaProfundidad, $cajaColor, $cajaPropiedad);

                $query1 = "DELETE FROM CAJANEGRA_BACKUP WHERE ID=$cajaId";
                $SQLq1 = mysqli_query($conexion, $query1);


                $query2 = "INSERT INTO CAJANEGRA VALUES ($cajaId,$cajaAltura,$cajaAnchura, $cajaProfundidad, '$cajaColor', '$cajaPropiedad' );";
                $SQLq2 = mysqli_query($conexion, $query2);

                $query3 = "UPDATE ESTANTERIA SET OCUPADAS = OCUPADAS + 1 WHERE ID = $idEstanteria";
                $SQLq3 = mysqli_query($conexion, $query3);

                $query4 = "INSERT INTO OCUPACION VALUES ($idEstanteria,$nEstante,$cajaId,'negra');";
                $SQLq4 = mysqli_query($conexion, $query4);

                if ($query1 && $query2 && $query3 && $query4) {
                    $conexion->commit();
                    return true;
                } else {
                    $conexion->rollback();
                }
//                return $query1." ____  ".$query2." ____  ".$query3." ____  ".$query4;
            //Borrar Caja de BACKUP OK        
            //Insertar la caja en el estante de la estanteria seleccionado en la vista 
            //anterior--> recolocarCajaEnEstante OK
            //Modificar ocupacion OK
            case "sorpresa":
                $cajaFuerte = new CajaFuerte($cajaAltura, $cajaAnchura, $cajaProfundidad, $cajaColor, $cajaPropiedad);

                $query1 = "DELETE FROM CAJASORPRESA_BACKUP WHERE ID=$cajaId";
                $SQLq1 = mysqli_query($conexion, $query1);


                $query2 = "INSERT INTO CAJASORPRESA VALUES ($cajaId,$cajaAltura,$cajaAnchura, $cajaProfundidad, '$cajaColor', '$cajaPropiedad' );";
                $SQLq2 = mysqli_query($conexion, $query2);

                $query3 = "UPDATE ESTANTERIA SET OCUPADAS = OCUPADAS + 1 WHERE ID = $idEstanteria";
                $SQLq3 = mysqli_query($conexion, $query3);

                $query4 = "INSERT INTO OCUPACION VALUES ($idEstanteria,$nEstante,$cajaId,'sorpresa');";
                $SQLq4 = mysqli_query($conexion, $query4);

                if ($query1 && $query2 && $query3 && $query4) {
                    $conexion->commit();
                    return true;
                } else {
                    $conexion->rollback();
                }
//                return $query1." ____  ".$query2." ____  ".$query3." ____  ".$query4;


            default:
                break;
        }
    }

}
