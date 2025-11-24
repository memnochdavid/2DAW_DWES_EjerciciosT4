<?php
//sé que el ejercicio pide sólo que tenga la propiedad saldo, pero eso es muy poca chicha,
//le voy a añadir titular, e IBAN
class CuentaBancaria
{
    public string $iban{
        get => $this->iban;
    }
    public string $titular{
        get => $this->titular;
    }
    private float $saldo;

    public function depositar($importe): void
    {
        $this->saldo += $importe;
    }
    public function retirar($importe): void{

        $this->saldo -= $importe;
    }
    public function consultarSaldo(): float{
        return $this->saldo;
    }

    /**
     * Constructor de la cuenta bancaria.
     * * @param string $iban El código IBAN.
     * @param string $titular El nombre del titular.
     * @param float $saldo Saldo inicial.
     * @throws ErrorIBAN Si el formato del IBAN no es válido
     */
    public function __construct(
        string $iban,
        string $titular,
        float $saldo = 0,
    ){
        if (!$this->validaIBAN($iban)) {
            throw new ErrorIBAN("El IBAN introducido ($iban) es incorrecto.");
        }
        $this->iban = $iban;
        $this->titular = $titular;
        $this->saldo = $saldo;
    }





    private function validaIBAN(string $iban): bool{
        $iban = strtoupper(str_replace([' ', '-'], '', $iban));
        //IA: Debe empezar por 2 letras (País), 2 números (Dígitos control) y resto alfanumérico
        if (!preg_match('/^[A-Z]{2}[0-9]{2}[A-Z0-9]{1,30}$/', $iban)) {
            return false;
        }
        return true;
    }
}

class ErrorIBAN extends Exception
{
    public function __construct($message = "El formato del IBAN no es válido", $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
class ErrorSaldoInsuficiente extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message = "El resultado de esta operación daría un saldo negativo: DENEGADO, PUTO POBRE.", $code, $previous);
    }
}