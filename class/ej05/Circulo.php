<?php


require_once __DIR__ . '/../../interface/ej05/Calculable.php';


class Circulo implements Calculable
{
    private float $radio;

    public function __construct(float $radio)
    {
        $this->radio = $radio;
    }

    public function calcularArea(): float
    {
        //pi*r²
        return M_PI * pow($this->radio, 2);
    }

    public function calcularPerimetro(): float
    {
        //2*π*r
        return 2 * M_PI * $this->radio;
    }

    public function toString():string{
        return "Círculo: {'area': ". $this->calcularArea() .", 'perimetro': ".$this->calcularPerimetro()."}";
    }
}