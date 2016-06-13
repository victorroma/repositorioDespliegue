<?php

class Inventario {

    private $fecha;
    private $estanteriasCaja;

    public function __construct($fecha, $estanteriasCaja) {
        $this->fecha = $fecha;
        $this->estanteriasCaja = $estanteriasCaja;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getEstanteriasCaja() {
        return $this->estanteriasCaja;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setEstanteriasCaja($estanteriasCaja) {
        $this->estanteriasCaja = $estanteriasCaja;
    }

    public function __toString() {
        return "estanteriasCaja======>". $this->getEstanteriasCaja();
    }

}
