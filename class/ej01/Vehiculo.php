<?php
//Ejercicio 01
class Vehiculo
{
    public string $brand{
        get => $this->brand;
        set{
            $this->brand = $value;
        }
    }
    public string $model{
        get => $this->model;
        set{
            $this->model = $value;
        }
    }
    public int $year{
        get => $this->year;
        set{
            $this->year = $value;
        }
    }

    public function toString():string{
        return "Vehículo: {brand: $this->brand, model: $this->model, year: $this->year}\n";
    }

    public function __construct(
        string $brand,
        string $model,
        int $year,
    ){
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }
}