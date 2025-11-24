<?php

require_once __DIR__ . '/../../interface/ej05/Calculable.php';


class Rectangulo implements Calculable
{
    private float $base;
    private float $altura;

    public function __construct(float $base, float $altura)
    {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea(): float
    {
        //base * altura
        return $this->base * $this->altura;
    }

    public function calcularPerimetro(): float
    {
        //(base + altura) * 2
        return ($this->base + $this->altura) * 2;
    }
    public function toString():string{
        return "Rectángulo: {'area': ".$this->calcularArea().", 'perimetro': ".$this->calcularPerimetro()."}";
    }
}