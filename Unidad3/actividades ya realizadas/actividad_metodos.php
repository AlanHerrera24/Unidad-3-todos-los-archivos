<?php
class Calculadora {
 // Método de instancia para sumar
 public function sumar($a, $b) {
 return $a + $b;
 }
 // Método de instancia para multiplicar
 public function multiplicar($a, $b) {
 return $a * $b;
 }
 //metodo nuevo restar reto1
 public function restar($a, $b){
 return $a-$b;
 }
 //metodo nuevo restar reto2
 public function dividir($a, $b) {
    // Validamos que el divisor no sea cero
    if ($b == 0) {
        return "un numero es 0: No se puede dividir por cero.";
    }
    return $a / $b;
}
 // Método de clase (estático) para mostrar un mensaje
 public static function mostrarMensaje() {
 return "Bienvenido a la Calculadora en PHP 🚀";
 }
}
//reto3
class Conversor {
    /**
     * Convierte una temperatura de grados Celsius a Fahrenheit.
     * La fórmula es: (Celsius * 9/5) + 32
     */
    public static function celsiusAFahrenheit($a) {
        return ($a * 9 / 5) + 32;
    }
}
?>
