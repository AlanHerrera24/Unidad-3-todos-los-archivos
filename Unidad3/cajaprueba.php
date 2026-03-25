<?php
require_once "caja.php";

// Crear una caja
$caja1 = new Caja(2.5, 3.0, 4.0);

// Mostrar datos básicos
echo "Caja original:<br>";
echo $caja1 . "<br>";
echo "Volumen: " . $caja1->volumen() . "<br>";
echo "Área total: " . $caja1->areaTotal() . "<br>";
echo "Área total (métodos privados): " . $caja1->areaTotals() . "<br><br>";

// Copiar caja
$caja2 = Caja::copiarCaja($caja1);
echo "Caja copiada:<br>";
echo $caja2 . "<br><br>";

// Caja más grande
$cajaGrande = $caja1->cajaMasGrande();
echo "Caja 25% más grande:<br>";
echo $cajaGrande . "<br>";
echo "Volumen: " . $cajaGrande->volumen() . "<br><br>";

// Caja más pequeña
$cajaPequena = $caja1->cajaMasPequena();
echo "Caja 25% más pequeña:<br>";
echo $cajaPequena . "<br>";
echo "Volumen: " . $cajaPequena->volumen() . "<br>";
?>