<?php

class Estanteria {

    private $id;
    private $max;
    private $material;
    private $pasillo;
    private $numero;
    private $ocupadas;

    
    public function __construct( $max, $material, $pasillo, $numero, $ocupadas=0) {
        $this->max = $max;
        $this->material = $material;
        $this->pasillo = $pasillo;
        $this->numero = $numero;
        $this->ocupadas = $ocupadas;
        
    }

    public function getId() {
        return $this->id;
    }

    public function getMax() {
        return $this->max;
    }

    public function getMaterial() {
        return $this->material;
    }

    public function getPasillo() {
        return $this->pasillo;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getOcupadas() {
        return $this->ocupadas;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setMax($max) {
        $this->max = $max;
    }

    public function setMaterial($material) {
        $this->material = $material;
    }

    public function setPasillo($pasillo) {
        $this->pasillo = $pasillo;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setOcupadas($ocupadas) {
        $this->ocupadas = $ocupadas;
    }

    public function __toString() {
        
    }

}
