<?php

class CajaFuerte extends Caja {

    //put your code here
    private $codigoSeguridad;

    function __construct($altura, $anchura, $profundidad, $color, $codigoSeguridad) {
        parent::__construct($altura, $anchura, $profundidad, $color);
        $this->codigoSeguridad = $codigoSeguridad;
    }

    function getCodigoSeguridad() {
        return $this->codigoSeguridad;
    }

    function setCodigoSeguridad($codigoSeguridad) {
        $this->codigoSeguridad = $codigoSeguridad;
    }

    public function __toString() {
        return parent::__toString() . " CodigoSeguridad: " . $this->codigoSeguridad . "<br";
    }

    public function volumen() {
        return $this->getAltura() * $this->getAnchura() * $this->getProfundidad();
    }

}
