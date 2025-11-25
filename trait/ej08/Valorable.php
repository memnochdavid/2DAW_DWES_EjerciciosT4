<?php


trait Valorable
{
    public int $valoracion;
    private int $totalVotos=0;
    private int $puntosTotales=0;

    public function puntuar($puntos):void{
        $this->totalVotos++;
        $this->puntosTotales += $puntos;
        $this->valoracion = $this->puntosTotales / $this->totalVotos;
    }
    public function obtenerPuntuacion():int
    {
        return $this->valoracion;
    }

}