<?php
// Incluir la clase
require_once 'actividad_metodos.php';
// Llamar al método de clase (estático)
echo Calculadora::mostrarMensaje() . "<br>";
// Crear una instancia de la clase
$miCalculadora = new Calculadora();
$gradosfarenheit = new Conversor();
// Usar los métodos de instancia
echo "Suma de 5 + 3: " . $miCalculadora->sumar(5, 3) . "<br>";
echo "Multiplicación de 4 * 2: " . $miCalculadora->multiplicar(4, 2) . "<br>";
echo "Restaremos esto 3-2=". $miCalculadora->restar(3, 2) . "<br>"; 
echo "Restaremos esto 3/3=". $miCalculadora->dividir(3, 3) . "<br>"; 
echo "Se hara la conversion de 100 grados celcius a farenheit=" .$gradosfarenheit->celsiusAFahrenheit(100). "<br>";
?>