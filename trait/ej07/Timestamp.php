<?php

trait Timestamp {
    public string $fechaCreacion;

    public function marcarCreacion(): string
    {
        return $this->fechaCreacion = date('Y-m-d H:i:s');
    }

    public function obtenerFecha() {
        return $this->fechaCreacion;
    }
}