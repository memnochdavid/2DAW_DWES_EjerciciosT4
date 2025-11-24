<?php


abstract class Figura
{
    protected string $color;

    public function __construct(string $color){
        $this->color = $color;
    }

    public function obtenerColor():string{
        return $this->color;
    }

    public abstract function calcularArea():float;
    public abstract function toString():string;


}