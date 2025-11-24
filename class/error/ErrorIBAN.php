<?php


class ErrorIBAN extends Exception
{
    public function __construct($message = "El formato del IBAN no es válido", $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}