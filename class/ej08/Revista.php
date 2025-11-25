<?php


class Revista extends Material
{
    public bool $prestado {
        get {
            return $this->prestado;
        }
        set {
            $this->prestado = $value;
        }
    }



    public string $publicado{
        get{
            return $this->publicado;
        }
        set{
            $this->publicado = $value;
        }
    }
    public string $tematica{
        get{
            return $this->tematica;
        }
        set{
            $this->tematica = $value;
        }
    }


    public function __construct($titulo,$autor,$publicado,$tematica,)
    {
        parent::__construct($titulo,$autor);
        $this->publicado = $publicado;
        $this->tematica = $tematica;
        $this->prestado = false;
        $this->valoracion = 0;
    }

    /**
     * @throws ErrorMaterialNoDisponible
     */
    public function prestar(): void
    {
        if(!$this->prestado) $this->prestado = true;
        else throw new ErrorMaterialNoDisponible();
    }

    public function devolver(): void
    {
        $this->prestado = false;
    }


    public function toString(): string
    {
        $output = "Revista: {'Fecha': '$this->publicado', 'Título': '$this->titulo', 'autor': '$this->autor', 'temática': '$this->tematica', 'estado': ";
        if ($this->prestado) $output.= "'No disponible', ";
        else $output.= "'Disponible', ";
        $valoracion = $this->obtenerPuntuacion();

        $output .= "'puntuación': $valoracion}\n";

        return $output;
    }
}