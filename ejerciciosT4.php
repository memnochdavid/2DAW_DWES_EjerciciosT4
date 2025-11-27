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

    return match ($tipo) {
        'int' => filter_var($input, FILTER_VALIDATE_FLOAT) !== false ? $input : null,
        default => null,
    };
}



//OJO -- resultado del aburrimiento
//se me ocurrió buscar en internet (le pregunté a Gemini XD) si se puede crear una función que sirva para instanciar clases, y me dijo
//que eso se llama "Patrón Factory (Fábrica) o instanciación dinámica", cosa que me suena que vi en las prácticas del año pasado en Java.
//Lo había olvidado completamente XD

/**
 * @throws ReflectionException
 * @throws Exception
 */
function crearObjeto(string $nombreClase): object
{
    if (!class_exists($nombreClase)) {
        throw new Exception("La clase $nombreClase no existe.");
    }

    //se referencia la clase mediante su nombre
    $reflector = new ReflectionClass($nombreClase);

    //constructor
    $constructor = $reflector->getConstructor();

    //si no tiene constructor, se instancia directamente
    if (is_null($constructor)) {
        return new $nombreClase();
    }

    //parámetros del constructor
    $parametros = $constructor->getParameters();
    $argumentosParaInstanciar = [];

    echo "\nCreando un nuevo ".$reflector->getShortName()."\n";

    //se van pidiendo valores para cada parámetro
    foreach ($parametros as $param) {
        $nombreParam = $param->getName();

        //tipo
        $tipo = $param->getType();
        $nombreTipo = ($tipo) ? $tipo->getName() : 'mixed';

        //si tiene valores por defecto, es "opcional"
        $esOpcional = $param->isOptional();
        $prompt = "Introduce valor para '$nombreParam' ($nombreTipo)";

        if ($esOpcional) {
            $valorDefault = $param->getDefaultValue();
            $prompt .= " [Enter para usar default: $valorDefault]";
        }
        $prompt .= ": ";

        //input
        $input = readline($prompt);

        //validación de input vacío
        if ($input === "" && $esOpcional) {
            $argumentosParaInstanciar[] = $valorDefault;
        } else {
            //por si acaso
            if ($nombreTipo === 'int') $input = (int)$input;
            elseif ($nombreTipo === 'float') $input = (float)$input;
            elseif ($nombreTipo === 'bool') $input = (bool)$input;

            //va agregando los argumentos
            $argumentosParaInstanciar[] = $input;
        }
    }
    //newInstanceArgs es el equivalente a usar ...$args
    return $reflector->newInstanceArgs($argumentosParaInstanciar);
}

/**
 * @throws ErrorIBAN
 * @throws ErrorSaldoNegativo
 * @throws ErrorSalarioIncorrecto
 * @throws ErrorMaterialNoDisponible
 * @throws Exception
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
            //se instancia con Patron Factory
            $vehiculo = crearObjeto(Vehiculo::class);
            //se instancia la clase - clásico
//            $vehiculo = new Vehiculo("Seat", "León", 1998);
        echo $vehiculo->toString();
            break;
        case 2:
            //se instancia con Patron Factory
            $coche = crearObjeto(Coche::class);
//            $coche = new Coche("Seat", "León", 1998, 4);
            echo $coche->toString();
            break;
        case 3:
            //PF
            $cuentaBancaria = crearObjeto(CuentaBancaria::class);

            //IBAN: Debe empezar por 2 letras (País), 2 números (Dígitos control) y resto alfanumérico
//            $cuentaBancaria = new CuentaBancaria("ES2114650123456789012345", "Nombre Cliente", 10);
            echo $cuentaBancaria -> consultarSaldo();
            break;
        case 4:
            $empleado = crearObjeto(Empleado::class);
//            $empleado = new Empleado("", 1000);
            //se usan el setter
            $empleado->nombre = "Alberto Ejemplo";
            echo $empleado->toString();
            break;
        case 5:
            $circulo = crearObjeto(Circulo::class);

            //$circulo = new Circulo(5);
            echo $circulo->toString();
            echo "\n";
//            $rectangulo = new Rectangulo(4,8);
            $rectangulo = crearObjeto(Rectangulo::class);
            echo $rectangulo->toString();
            break;
        case 6:
//            $triangulo = new Triangulo("Triángulo","Rojo", 5, 3);
            $triangulo = crearObjeto(Triangulo::class);
            echo $triangulo->toString();
            echo "\n";
//            $cuadrado = new Cuadrado("Cuadrado","Verde", 5);
            $cuadrado = crearObjeto(Cuadrado::class);

            echo $cuadrado->toString();
            echo "\n";
            break;
        case 7:
//            $articulo = new Articulo(1, "Cubo", "Un cubo para fregar - just for women", 5.95);
            $articulo = crearObjeto(Articulo::class);
            echo $articulo->toString();
            break;
        case 8:
//            $libro1 = new Libro("Harry Potter y la Piedra Filosofal", "JK Rowling", "ASD234ASD", "Primer libro de la saga");
            $libro1 = crearObjeto(Libro::class);

            $libro1->prestar();
            $libro1->puntuar(3);
            $libro1->puntuar(3);
            $libro1->puntuar(3);
            echo $libro1->toString();
            echo "\n";

//            $revista1 = new Revista("Penthouse", "Penthouse SA", "17/09/2006", "Just for men");
            $revista1 = crearObjeto(Revista::class);
            $revista1->puntuar(9999);
            $revista1->puntuar(9999);
            $revista1->puntuar(9999);
            $revista1->puntuar(9999);
            $revista1->puntuar(9999);
            echo $revista1->toString();
            echo "\n";

//            $dvd1 = new DVD("Die Hard", "John McTiernan", 12354, "McClaaaaaaiiiiinnnnnnn!!!!!!", 132);
            $dvd1 = crearObjeto(DVD::class);
            $dvd1->puntuar(9999999999);
            $dvd1->puntuar(9999999999);
            $dvd1->puntuar(9999999999);
            $dvd1->puntuar(9999999999);
            $dvd1->puntuar(9999999999);
            $dvd1->puntuar(9999999999);
            $dvd1->puntuar(0);//algún desgraciado
            echo $dvd1->toString();


            break;
    }
}

try {
    execEjercicios();
} catch (ErrorIBAN|ErrorSalarioIncorrecto|ErrorSaldoNegativo|ErrorMaterialNoDisponible|Exception $e) {
    echo $e->getMessage();
}