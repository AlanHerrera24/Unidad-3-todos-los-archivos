<?php
// Incluir la clase Operaciones
require_once 'operacion.php';
// Crear un objeto de la clase Operaciones
$operacion = new Operaciones();
// Llamar al método sin parámetros
echo "Suma sin parámetros (usando propiedades de la clase): " . $operacion->sumarSinParametros() .
"<br>";
// Llamar al método con parámetros
echo "Suma con parámetros (5 + 7): " . $operacion->sumarConParametros(5, 7) . "<br>";
//reto adicional
echo "multiplicar sin parámetros (usando propiedades de la clase): " . $operacion->multiplicarSinParametros() .
"<br>";
// Llamar al método con parámetros
echo "multiplicar con parámetros (5 + 7): " . $operacion->multiplicarConParametros(5, 7) . "<br>";
?>
