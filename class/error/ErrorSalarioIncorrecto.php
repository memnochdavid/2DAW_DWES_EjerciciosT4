<?php

class ErrorSalarioIncorrecto extends Exception
{
    public function __construct($message = "El salario de un empleado debe ser mayor a cero!", $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}