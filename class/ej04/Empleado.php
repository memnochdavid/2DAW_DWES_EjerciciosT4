<?php

require_once __DIR__ . '/../error/ErrorSalarioIncorrecto.php';

class Empleado
{
    public string $nombre {
        get => strtoupper($this->nombre);
        set => $this->nombre = $value;
    }
    private float $salarioMensual{
        set{
            if($value < 0) throw new ErrorSalarioIncorrecto();
            else $this->salarioMensual = $value;
        }
        //ERROR POR QUÉ?
//        get{
//            $this->salarioMensual;
//        }
    }

    /**
     * @throws ErrorSalarioIncorrecto
     */
    public function __construct(string $nombre, float $salarioMensual){
        $this->nombre = $nombre;
        if($salarioMensual < 0) throw new ErrorSalarioIncorrecto();
        $this->salarioMensual = $salarioMensual;
    }

    public function salarioAnual(): float{
        return $this->salarioMensual*14; //12 meses + 2 pagas
    }

    public function toString():string{
        return "Empleado: ".$this->nombre.", Salario Mensual: ".$this->salarioMensual.", Salario Anual: ".$this->salarioAnual();
    }
}