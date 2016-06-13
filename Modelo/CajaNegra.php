<?php

class CajaNegra extends Caja {

    private $placa;

    //CONTRUCTOR
    function __construct($altura, $anchura, $profundidad, $color,  $placa) {
        parent::__construct($altura, $anchura, $profundidad, $color);
        $this->placa = $placa;
    }

    //GET Y SET PLACA
    public function getPlaca() {
        return $this->placa;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    //TOSTRING
        public function __toString() {
        return parent::__toString() . " placa: " . $this->placa . "<br";
    }

    //VOLUMEN
    public function volumen() {
        return $this->getAltura() * $this->getAnchura() * $this->getProfundidad();
    }

}
