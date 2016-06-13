<?php

abstract class Caja {

    //Propiedades.
    private $id;
    private $altura;
    private $anchura;
    private $profundidad;
    private $color;

    //Constructor, solo uno, no admite sobrecarga.
    function __construct($altura, $anchura, $profundidad, $color) {
        $this->altura = $altura;
        $this->anchura = $anchura;
        $this->profundidad = $profundidad;
        $this->color = $color;
    }

    //Métodos.
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

        function getColor() {
        return $this->color;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function getAltura() {
        return $this->altura;
    }

    function getAnchura() {
        return $this->anchura;
    }

    function getProfundidad() {
        return $this->profundidad;
    }

    function setAltura($altura) {
        $this->altura = $altura;
    }

    function setAnchura($anchura) {
        $this->anchura = $anchura;
    }

    function setProfundidad($profundidad) {
        $this->profundidad = $profundidad;
    }


        public function __toString() {
        return "Altura: " . $this->altura . ", anchura: " . $this->anchura . ", profundidad: " . $this->profundidad . ", color: " . $this->color;
    }

    abstract function volumen();
}
