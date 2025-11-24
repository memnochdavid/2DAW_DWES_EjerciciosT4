<?php

class ErrorSaldoNegativo extends Exception
{
    public function __construct(
        string $message = "No se puede crear una cuenta con un saldo negativo.",
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}