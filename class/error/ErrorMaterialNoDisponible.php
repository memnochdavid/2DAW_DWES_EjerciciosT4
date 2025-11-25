<?php



class ErrorMaterialNoDisponible extends Exception
{
    public function __construct(
        string $message = "El libro no esta disponible",
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}