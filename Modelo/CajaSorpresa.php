<?php

class CajaSorpresa extends Caja {

    //put your code here
    private $sorpresa;

    function __construct($altura, $anchura, $profundidad, $color, $sorpresa) {
        parent::__construct($altura, $anchura, $profundidad, $color);
        $this->sorpresa = $sorpresa;
    }

    function getSorpresa() {
        return $this->sorpresa;
    }

    function setSorpresa($sorpresa) {
        $this->sorpresa = $sorpresa;
    }

    public function __toString() {
        return parent::__toString() . ", sorpresa: " . $this->sorpresa;
    }

    public function volumen() {
        return $this->getAltura() * $this->getAnchura() * $this->getProfundidad();
    }

}
