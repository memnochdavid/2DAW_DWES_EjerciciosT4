<?php

require_once("Figura.php");

class Triangulo extends Figura
{
    public string $nombre;
    public float $base;
    public float $altura;

    public function __construct(
        $nombre,
        $color,
        $base,
        $altura
    ){
        parent::__construct($color);
        $this->nombre = $nombre;
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea(): float
    {
        return ($this->base * $this->altura) / 2;
    }


    public function toString(): string
    {
        return "'$this->nombre': {'color': '".parent::obtenerColor()."', 'base': $this->base, 'altura': $this->altura, 'area': ".$this->calcularArea()."}";
    }
}