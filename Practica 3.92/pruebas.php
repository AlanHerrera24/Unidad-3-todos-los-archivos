<?php
require_once 'clase_fraccion.php';

echo "PRUEBAS DE LA CLASE FRACCION<br><br>";

try {
    // Crear fracciones
    $f1 = new Fraccion(1, 2);
    $f2 = new Fraccion(3, 4);

    echo "Fracción 1: $f1<br>";
    echo "Fracción 2: $f2<br><br>";

    // Suma
    $suma = $f1->sumar($f2);
    $suma->simplificar();
    echo "Suma: $suma<br>";

    // Resta
    $resta = $f1->restar($f2);
    $resta->simplificar();
    echo "Resta: $resta<br>";

    // Multiplicacion
    $mult = $f1->multiplicar($f2);
    $mult->simplificar();
    echo "Multiplicacion: $mult<br>";

    // Division
    $div = $f1->dividir($f2);
    $div->simplificar();
    echo "Division: $div<br><br>";

    // valor decimal
    echo "Decimal de f1: " . $f1->valorDecimal() . "<br>";

    // comparacion
    $f3 = new Fraccion(2, 4);
    echo "¿f1 es igual a 2/4? " . ($f1->esIgual($f3) ? "Sí" : "No") . "<br>";

    // entero
    $f4 = new Fraccion(4, 2);
    echo "¿4/2 es entero? " . ($f4->esEntero() ? "Sí" : "No") . "<br>";

    // numero mixto
    $f5 = new Fraccion(7, 3);
    echo "Numero mixto de 7/3: " . $f5->aNumeroMixto() . "<br>";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>