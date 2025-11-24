<?php

require_once("Figura.php");

class Cuadrado extends Figura
{
    public string $nombre;
    public float $lado;

    public function __construct(
        $nombre,
        $color,
        $lado
    ){
        parent::__construct($color);
        $this->nombre = $nombre;
        $this->lado = $lado;
    }

    public function calcularArea(): float
    {
        return $this->lado * $this->lado;
    }


    public function toString(): string
    {
        return "'$this->nombre': {'color': '".parent::obtenerColor()."', 'lado': $this->lado, 'area': ".$this->calcularArea()."}";
    }
}