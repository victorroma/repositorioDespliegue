<?php

include '../Modelo/Estanteria.php';

class EstanteriaCaja extends Estanteria {

    private $cajas;
    private $numEstantes;

    public function __construct($cajas, $numEstantes) {
        $this->cajas = $cajas;
        $this->numEstantes = $numEstantes;
    }

    public function getCajas() {
        return $this->cajas;
    }

    public function setCajas($cajas) {
        $this->cajas = $cajas;
    }

    function getNumEstantes() {
        return $this->numEstantes;
    }

    function setNumEstantes($numEstantes) {
        $this->numEstantes = $numEstantes;
    }

}
