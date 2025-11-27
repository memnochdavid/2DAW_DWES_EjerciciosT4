<?php

require_once('Material.php');
require_once __DIR__ . '/../error/ErrorMaterialNoDisponible.php';
class DVD extends Material
{
    public bool $prestado {
        get {
            return $this->prestado;
        }
        set {
            $this->prestado = $value;
        }
    }

    public int $id{
        get{
            return $this->id;
        }
        set{
            $this->id = $value;
        }
    }
    public string $sinopsis{
        get{
            return $this->sinopsis;
        }
        set{
            $this->sinopsis = $value;
        }
    }
    public float $duracion{
        get => $this->duracion;
        set => $this->duracion = $value;
    }


    public function __construct(string $titulo, string $autor,int $id,string $sinopsis,float $duracion)
    {
        parent::__construct($titulo,$autor);
        $this->id = $id;
        $this->sinopsis = $sinopsis;
        $this->duracion = $duracion;
        $this->prestado = false;
        $this->valoracion = 0;
    }

    public function toString(): string
    {
        $output = "DVD: {'ID': '$this->id', 'Título': '$this->titulo', 'director': '$this->autor', 'sinopsis': '$this->sinopsis', 'duración': $this->duracion, 'estado': ";
        if ($this->prestado) $output.= "'No disponible', ";
        else $output.= "'Disponible', ";

        $valoracion = $this->obtenerPuntuacion();

        $output .= "'puntuación': $valoracion}\n";

        return $output;
    }

    public function prestar(): void
    {
        if(!$this->prestado) $this->prestado = true;
        else throw new ErrorMaterialNoDisponible();
    }

    public function devolver(): void
    {
        $this->prestado = false;
    }
}