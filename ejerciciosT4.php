<?php



require_once __DIR__ . '/class/ej01/Vehiculo.php';
require_once __DIR__ . '/class/ej02/Coche.php';
require_once __DIR__ . '/class/ej03/CuentaBancaria.php';
require_once __DIR__ . '/class/ej04/Empleado.php';
require_once __DIR__ . '/class/ej05/Circulo.php';
require_once __DIR__ . '/class/ej05/Rectangulo.php';
require_once __DIR__ . '/class/ej06/Triangulo.php';
require_once __DIR__ . '/class/ej06/Cuadrado.php';
require_once __DIR__ . '/class/ej07/Articulo.php';
require_once __DIR__ . '/class/ej08/Libro.php';
require_once __DIR__ . '/class/ej08/Revista.php';
require_once __DIR__ . '/class/ej08/DVD.php';

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
 * @throws ErrorMaterialNoDisponible
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
        case 6:
            $triangulo = new Triangulo("Triángulo","Rojo", 5, 3);
            echo $triangulo->toString();
            echo "\n";
            $cuadrado = new Cuadrado("Cuadrado","Verde", 5);
            echo $cuadrado->toString();
            break;
        case 7:
            $articulo = new Articulo(1, "Cubo", "Un cubo para fregar", 5.95);
            echo $articulo->toString();
            break;
        case 8:
            $libro1 = new Libro("Harry Potter y la Piedra Filosofal", "JK Rowling", "ASD234ASD", "Primer libro de la saga");
            $libro1->prestar();
            $libro1->puntuar(3);
            $libro1->puntuar(3);
            $libro1->puntuar(3);
            echo $libro1->toString();
            echo "\n";

            $revista1 = new Revista("Penthouse", "Penthouse SA", "17/09/2006", "Just for men");
            $revista1->puntuar(9999);
            $revista1->puntuar(9999);
            $revista1->puntuar(9999);
            $revista1->puntuar(9999);
            $revista1->puntuar(9999);
            echo $revista1->toString();
            echo "\n";

            $dvd1 = new DVD("Die Hard", "John McTiernan", 12354, "McClaaaaaaiiiiinnnnnnn!!!!!!", 132);
            $dvd1->puntuar(9999999999);
            $dvd1->puntuar(9999999999);
            $dvd1->puntuar(9999999999);
            $dvd1->puntuar(9999999999);
            $dvd1->puntuar(9999999999);
            $dvd1->puntuar(9999999999);
            $dvd1->puntuar(9999999999);
            echo $dvd1->toString();


            break;
    }
}

try {
    execEjercicios();
} catch (ErrorIBAN|ErrorSalarioIncorrecto|ErrorSaldoNegativo|ErrorMaterialNoDisponible $e) {
    echo $e->getMessage();
}