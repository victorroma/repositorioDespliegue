<?php

class Ocupacion {
    private $idEstanteria;
    private $nEstante;
    private $idCaja;
    private $tipo;
    
    function __construct($idEstanteria, $nLeja, $tipo, $idCaja = NULL) {
        $this->idEstanteria = $idEstanteria;
        $this->nEstante = $nLeja;
        $this->tipo = $tipo;
        $this->idCaja = $idCaja;
    }

    function getIdEstanteria() {
        return $this->idEstanteria;
    }

    function getNEstante() {
        return $this->nEstante;
    }

    function setNEstante($nEstante) {
        $this->nEstante = $nEstante;
    }

    
    function getIdCaja() {
        return $this->idCaja;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setIdEstanteria($idEstanteria) {
        $this->idEstanteria = $idEstanteria;
    }

    

    function setIdCaja($idCaja) {
        $this->idCaja = $idCaja;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }


    
    
}
