<?php



require_once('Material.php');
require_once __DIR__ . '/../error/ErrorMaterialNoDisponible.php';


class Libro extends Material
{
    public bool $prestado {
        get {
            return $this->prestado;
        }
        set {
            $this->prestado = $value;
        }
    }



    public string $iban{
        get{
            return $this->iban;
        }
        set{
            $this->iban = $value;
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


    public function __construct($titulo,$autor,$iban,$sinopsis,)
    {
        parent::__construct($titulo,$autor);
        $this->iban = $iban;
        $this->sinopsis = $sinopsis;
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
        $output = "Libro: {'IBAN': '$this->iban', 'Título': '$this->titulo', 'autor': '$this->autor', 'sinopsis': '$this->sinopsis', 'estado': ";
        if ($this->prestado) $output.= "'No disponible', ";
        else $output.= "'Disponible', ";

        $valoracion = $this->obtenerPuntuacion();

        $output .= "'puntuación': $valoracion}\n";

        return $output;
    }
}