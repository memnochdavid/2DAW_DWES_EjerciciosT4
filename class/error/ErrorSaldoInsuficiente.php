<?php


class ErrorSaldoInsuficiente extends Exception
{
    public function __construct(
        string $message = "El resultado de esta operación daría un saldo negativo: DENEGADO, PUTO POBRE.",
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}