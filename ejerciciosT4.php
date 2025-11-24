<?php



require_once __DIR__ . '/class/ej01/Vehiculo.php';
require_once __DIR__ . '/class/ej02/Coche.php';
require_once __DIR__ . '/class/ej03/CuentaBancaria.php';
require_once __DIR__ . '/class/ej04/Empleado.php';
require_once __DIR__ . '/class/ej05/Circulo.php';
require_once __DIR__ . '/class/ej05/Rectangulo.php';

function validaInput($mensaje, $tipo): false|string|null
{
    $input = readline($mensaje);

    switch ($tipo) {
        case 'int':
            return filter_var($input, FILTER_VALIDATE_FLOAT) !== false ? $input : null;
        //se pueden añadir más casas para cada tipo
        default:
            return null;
    }
}

/**
 * @throws ErrorIBAN
 * @throws ErrorSaldoNegativo
 * @throws ErrorSalarioIncorrecto
 *
 */
function execEjercicios(): void
{
    do{
        $ejecutaEj = validaInput("Ejercicio a ejecutar: ", "int");
        if($ejecutaEj != null) break;
    }while(true);

    switch($ejecutaEj){
        case 1:
            //se instancia la clase
            $vehiculo = new Vehiculo("Seat", "León", 1998);
            echo $vehiculo->toString();
            break;
        case 2:
            $coche = new Coche("Seat", "León", 1998, 4);
            echo $coche->toString();
            break;
        case 3:
            //IBAN: Debe empezar por 2 letras (País), 2 números (Dígitos control) y resto alfanumérico
            $cuentaBancaria = new CuentaBancaria("ES2114650123456789012345", "Nombre Cliente", 10);
            echo $cuentaBancaria -> consultarSaldo();
            break;
        case 4:
            $empleado = new Empleado("", 1000);
            $empleado->nombre = "Alberto Ejemplo";
            echo $empleado->toString();
            break;
        case 5:
            $circulo = new Circulo(5);
            echo $circulo->toString();
            echo "\n";
            $rectangulo = new Rectangulo(4,8);
            echo $rectangulo->toString();
            break;
    }
}

try {
    execEjercicios();
} catch (ErrorIBAN|ErrorSalarioIncorrecto|ErrorSaldoNegativo $e) {
    echo $e->getMessage();
}