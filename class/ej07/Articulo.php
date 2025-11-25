<?php

require_once __DIR__ . '/../../trait/ej07/Timestamp.php';


class Articulo
{
    use Timestamp;
    public int $idArticulo;
    public string $nombre;
    public string $descripcion;
    public float $precio;
    public string $fechaCreacion;

    public function __construct(int $idArticulo, string $nombre, string $descripcion, float $precio)
    {
        $this->fechaCreacion = $this->marcarCreacion();
        $this->idArticulo = $idArticulo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }

    public function toString(){
        return "$this->nombre : {'id': $this->idArticulo, 'nombre': $this->nombre, 'descripcion': '$this->descripcion', 'precio': $this->precio, 'fechaCreacion': '$this->fechaCreacion'}";
    }

}