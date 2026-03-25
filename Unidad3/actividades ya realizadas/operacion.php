<?php
class Operaciones {
 // Propiedades privadas
 private $num1 = 5; // la asignación de valores es solo como ejemplo
 private $num2 = 9; // no es una buena práctica, para ello se usarán constructores

 // Método sin parámetros: usa las propiedades de la clase
 public function sumarSinParametros() {
 return $this->num1 + $this->num2;
 }
 // Método con parámetros: recibe valores en la llamada
 public function sumarConParametros($a, $b) {
 return $a + $b;
 }
 //retos adicionales
 public function multiplicarSinParametros(){
    return $this->num1 * $this->num2;
 }
 public function multiplicarConParametros($a, $b) {
 return $a * $b;
 }
}
?>