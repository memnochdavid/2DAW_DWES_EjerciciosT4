<?php





//sé que el ejercicio pide sólo que tenga la propiedad saldo, pero eso es muy poca chicha,
//le voy a añadir titular, e IBAN y voy a crear las clases con los errores

require_once __DIR__ . '/../error/ErrorIBAN.php';
require_once __DIR__ . '/../error/ErrorSaldoInsuficiente.php';
require_once __DIR__ . '/../error/ErrorSaldoNegativo.php';

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

    /**
     * @throws ErrorSaldoInsuficiente
     */
    public function retirar($importe): void{
        if($this->saldo < $importe){
            throw new ErrorSaldoInsuficiente();
        }
        else{
            $this->saldo -= $importe;
        }
    }
    public function consultarSaldo(): string{
        return "Saldo de la cuenta ".$this->iban.": ".$this->saldo;
    }

    /**
     * @throws ErrorIBAN|ErrorSaldoNegativo Si el formato del IBAN no es válido
     */
    public function __construct(
        string $iban,
        string $titular,
        float $saldo = 0,
    ){
        if (!$this->validaIBAN($iban)) {
            throw new ErrorIBAN("El IBAN introducido ($iban) es incorrecto.");
        }
        else if($saldo < 0){
            throw new ErrorSaldoNegativo();
        }
        else{
            $this->iban = $iban;
            $this->titular = $titular;
            $this->saldo = $saldo;
        }
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

