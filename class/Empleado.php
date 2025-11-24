<?php

require "./error/ErrorSalarioIncorrecto.php";
class Empleado
{
    public string $nombre {
        get => strtoupper($this->nombre);
        set => $this->nombre = $value;
    }
    private float $salarioMensual{
        set{
            if($value <= 0) throw new ErrorSalarioIncorrecto();
            else $this->salarioMensual = $value;
        }
        get{
            $this.$this->salarioMensual;
        }
    }

    public function salarioAnual(): float{
        return $this->salarioMensual*14; //12 meses + 2 pagas
    }
}