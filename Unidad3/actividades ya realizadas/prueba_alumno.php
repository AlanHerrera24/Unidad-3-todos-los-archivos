<?php
// Incluir la clase Alumno
require_once 'alumno.php';
$alumno1 = new Alumno();
// reto 2
$alumno2 = new Alumno();
// Asignar valores usando los métodos setters (Alumno 1)
$alumno1->setNombre("Carlos");
$alumno1->setApellidos("Gómez Pérez");
$alumno1->setNumeroControl("A12345678");

// Asignar valores usando el nuevo método asignarDatos (Alumno 2)
$alumno2->asignarDatos("Ana", "Martínez Sosa", "B98765432");

echo "<strong>Datos del Alumno 1:</strong><br>";
$alumno1->mostrarDatos();

echo "<strong>Datos del Alumno 2:</strong><br>";
$alumno2->mostrarDatos();
?>