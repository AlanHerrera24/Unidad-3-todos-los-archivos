<?php
// Incluir la clase Persona
require_once 'persona.php';
// Crear un objeto de la clase Persona
$persona1 = new Persona();
// Intentar acceder a las propiedades directamente
echo "Accediendo directamente a las propiedades:<br>";
echo "Nombre: " . $persona1->nombre . "<br>"; // Sí se puede acceder
// Accediendo mediante getters
echo "<br>Accediendo mediante getters:<br>";
echo "Edad: " . $persona1->getEdad() . "<br>";
echo "DNI: " . $persona1->getDni() . "<br>";
// Modificando valores con setters
$persona1->setEdad(30);
$persona1->setDni("87654321Z");
echo "<br>Después de modificar con setters:<br>";
echo "Edad: " . $persona1->getEdad() . "<br>";
echo "DNI: " . $persona1->getDni() . "<br>";
// Mostrar datos desde el método dentro de la clase
echo "<br>Accediendo a las propiedades mediante el método mostrarDatos():<br>";
$persona1->mostrarDatos();
?>