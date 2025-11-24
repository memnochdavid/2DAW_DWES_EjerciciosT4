<?php

class Coche extends Vehiculo
{
    public int $numDoors{
        get => $this->numDoors;
        set{
            $this->numDoors = $value;
        }
    }

    public function toString(): string {
        $parentSTR = parent::toString();
        return "$parentSTR, Puertas: $this->numDoors";
    }

    public function __construct(
        string $brand,
        string $model,
        int $year,
        int $numDoors,
    ){
        parent::__construct($brand, $model, $year);
        $this->numDoors = $numDoors;
    }
}