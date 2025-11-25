<?php

require_once __DIR__ . '/../../interface/ej08/Prestable.php';
require_once __DIR__ . '/../../trait/ej08/Valorable.php';


abstract class Material implements Prestable
{
    use Valorable;
    public string $titulo {
        get {
            return $this->titulo;
        }
        set{
            $this->titulo = $value;
        }
    }
    public string $autor {
        get {
            return $this->autor;
        }
        set{
            $this->autor = $value;
        }
    }

    public function __construct(string $titulo, string $autor)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
    }

    public abstract function toString();

}