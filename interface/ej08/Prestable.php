<?php


interface Prestable{
    public bool $prestado {
        get;
        set;
    }


    public function prestar();
    public function devolver();

}