<?php
/**
* Clase Fraccion
* Autor: [Jesús Salas Marin]
* Fecha: [Fecha de Creación]
* Descripción: Esta clase representa una fracción y
* proporciona métodos para realizar operaciones aritméticas,
* simplificar la fracción, y mostrarla en formato adecuado.
*
* Atributos:
* - numerador: El numerador de la fracción.
* - denominador: El denominador de la fracción.
* Métodos:
* - __construct($numerador, $denominador): Constructor para inicializar la fracción.
* - setDenominador($denominador): Método privado para establecer el denominador con validación.
* - simplificar(): Método para simplificar la fracción utilizando el máximo común divisor (MCD).
* - sumar($otraFraccion): Método para sumar otra fracción a la fracción actual.
* - restar($otraFraccion): Método para restar otra fracción de la fracción actual.
* - multiplicar($otraFraccion): Método para multiplicar la fracción actual por otra fracción.
* - dividir($otraFraccion): Método para dividir la fracción actual por otra fracción.
* - __toString(): Método para mostrar la fracción en formato "numerador/denominador".
* - mcd($a, $b): Método privado para calcular el máximo común divisor de dos números utilizando el
* algoritmo de Euclides.
* - mcm($a, $b): Método privado para calcular el mínimo común múltiplo de dos números utilizando la
* relación entre el MCD y el MCM.
* Ejemplo de uso:
* $fraccion1 = new Fraccion(1, 2); // Representa 1/2
* $fraccion2 = new Fraccion(3, 4); // Representa 3/4
* $fraccion1->sumar($fraccion2); // Suma 1/2 + 3/4
* echo $fraccion1; // Muestra el resultado de la suma
*/
declare(strict_types=1);
class Fraccion {
 // Atributos privados para el numerador y denominador
 private int $numerador;
 private int $denominador;
 // Constructor para inicializar la fracción sin simplificar
 public function __construct(int $numerador, int $denominador) {
 $this->numerador = $numerador;
 $this->setDenominador($denominador);
 }
 /**
 * setter para el denominador con validación
 * @param int $denominador El denominador de la fracción
 * @return void
 */
 private function setDenominador(int $denominador): void {
 if ($denominador == 0) {
 throw new InvalidArgumentException("El denominador no puede ser cero.");
 }
 $this->denominador = $denominador;
 }
 /**
 * setter para el numerador
 * @param int $numerador El numerador de la fracción
 * @return void
 */
 public function setNumerador(int $numerador): void {
 $this->numerador = $numerador;
 }
 /**
 * getter para el numerador
 * @return int El numerador de la fracción
 */
 public function getNumerador(): int {
return $this->numerador;
 }
 /**
 * getter para el denominador
 * @return int El denominador de la fracción
 */
 public function getDenominador(): int {
 return $this->denominador;
 }
 /**
 * Método para mostrar la fracción en formato "numerador/denominador"
 * @return string La representación de la fracción
 */
 public function __toString(): string {
 return $this->numerador . '/' . $this->denominador;
 }
 /**
 * Método para obtener el valor decimal de la fracción
 * @return float El valor decimal de la fracción
 */
 public function valorDecimal(): float {
 return $this->numerador / $this->denominador;
 }
 /**
 * Método privado para calcular el máximo común divisor de dos números utilizando el algoritmo de
 * Euclides
 * @param int $a El primer número
 * @param int $b El segundo número
 * @return int El máximo común divisor
 */
 private function mcd(int $a, int $b): int {
 while ($b != 0) {
 $temp = $b;
 $b = $a % $b;
 $a = $temp;
 }
 return abs($a);
 }
 /** Método privado para calcular el mínimo común múltiplo de dos números utilizando la relación
  * entre el MCD y el MCM
 * @param int $a El primer número
 * @param int $b El segundo número
 * @return int El mínimo común múltiplo
 */
 private function mcm(int $a, int $b): int {
 return abs($a * $b) / $this->mcd($a, $b);
 }
 /** Método para simplificar la fracción utilizando el máximo común divisor (MCD)
 * Este método divide el numerador y el denominador por su MCD para reducir la fracción a su forma 
 * más simple.
 * Además, asegura que el denominador sea positivo, ajustando el signo del numerador si es necesario.
 */
 public function simplificar(): void {
 $divisor = $this->mcd($this->numerador, $this->denominador);
 $this->numerador /= $divisor;
 $this->denominador /= $divisor;
 // Asegurar que el denominador sea positivo
 if ($this->denominador < 0) {
 $this->numerador = -$this->numerador;
 $this->denominador = -$this->denominador;
 }
 }
 /**
 * Suma otra fracción a la fracción actual
 * @param Fraccion $otraFraccion La fracción a sumar
 * @return Fraccion La fracción resultante de la suma
 */
 public function sumar(Fraccion $otraFraccion): Fraccion {
 // Validar que el argumento sea una instancia de Fraccion
 if (!($otraFraccion instanceof Fraccion)) {
 throw new InvalidArgumentException("El argumento debe ser una instancia de Fraccion.");
 }
 $mcm = $this->mcm($this->denominador, $otraFraccion->denominador);
 $nuevoNumerador = ($this->numerador * ($mcm / $this->denominador)) + ($otraFraccion->numerador *
($mcm / $otraFraccion->denominador));
 return new Fraccion($nuevoNumerador, $mcm);
 }
 /**
 * Resta otra fracción de la fracción actual
 * @param Fraccion $otraFraccion La fracción a restar
 * @return Fraccion La fracción resultante de la resta
 */
 public function restar(Fraccion $otraFraccion): Fraccion {
 // Validar que el argumento sea una instancia de Fraccion
 if (!($otraFraccion instanceof Fraccion)) {
 throw new InvalidArgumentException("El argumento debe ser una instancia de Fraccion.");
 }
 $mcm = $this->mcm($this->denominador, $otraFraccion->denominador);
 $nuevoNumerador = ($this->numerador * ($mcm / $this->denominador)) - ($otraFraccion->numerador *
($mcm / $otraFraccion->denominador));
 return new Fraccion($nuevoNumerador, $mcm);
 }
 /**
  * * Multiplica la fracción actual por otra fracción
 * @param Fraccion $otraFraccion La fracción a multiplicar
 * @return Fraccion La fracción resultante de la multiplicación
 */
 public function multiplicar(Fraccion $otraFraccion): Fraccion {
 // Validar que el argumento sea una instancia de Fraccion
 if (!($otraFraccion instanceof Fraccion)) {
 throw new InvalidArgumentException("El argumento debe ser una instancia de Fraccion.");
 }
 $nuevoNumerador = $this->numerador * $otraFraccion->numerador;
 $nuevoDenominador = $this->denominador * $otraFraccion->denominador;
 return new Fraccion($nuevoNumerador, $nuevoDenominador);
 }
 /**
 * Divide la fracción actual por otra fracción
 * @param Fraccion $otraFraccion La fracción a dividir
 * @return Fraccion La fracción resultante de la división
 */
 public function dividir(Fraccion $otraFraccion): Fraccion {
 // Validar que el argumento sea una instancia de Fraccion
 if (!($otraFraccion instanceof Fraccion)) {
 throw new InvalidArgumentException("El argumento debe ser una instancia de Fraccion.");
 }
 if ($otraFraccion->numerador == 0) {
 throw new InvalidArgumentException("No se puede dividir por una fracción con numerador
cero.");
 }
 $nuevoNumerador = $this->numerador * $otraFraccion->denominador;
 $nuevoDenominador = $this->denominador * $otraFraccion->numerador;
 return new Fraccion($nuevoNumerador, $nuevoDenominador);
 }
 /** Método para verificar si dos fracciones son iguales
 * @param Fraccion $otraFraccion La fracción a comparar
 * @return bool True si las fracciones son iguales, false en caso contrario
 */
 public function esIgual(Fraccion $otraFraccion): bool {
 // Validar que el argumento sea una instancia de Fraccion
 if (!($otraFraccion instanceof Fraccion)) {
 throw new InvalidArgumentException("El argumento debe ser una instancia de Fraccion.");
 }
 $this->simplificar();
 $otraFraccion->simplificar();
 return ($this->numerador == $otraFraccion->numerador) && ($this->denominador == $otraFraccion->denominador);
 }
 /** Método para verificar si la fracción es un número entero
 * @return bool True si la fracción es un número entero, false en caso contrario
 */
 public function esEntero(): bool {
    return ($this->numerador % $this->denominador) == 0;
 }
 /** Método para obtener la fracción como número mixto (para fracciones impropias)
 * @return string La representación del número mixto
 */
 public function aNumeroMixto(): string {
 if ($this->numerador < $this->denominador) {
 return $this->__toString(); // No es una fracción impropia
 }
 $entero = intdiv($this->numerador, $this->denominador);
 $resto = $this->numerador % $this->denominador;
 if ($resto == 0) {
 return (string)$entero; // Es un número entero
 }
 return $entero . ' ' . abs($resto) . '/' . $this->denominador; // Número mixto
 }
 //Desafio
 /**
     * Eleva la fracción a una potencia entera.
     * @param int $exponente El exponente al que se elevará la fracción.
     * @return Fraccion Una nueva instancia con el resultado.
     */
    public function potencia(int $exponente): Fraccion {
        $nuevoNumerador = (int)pow($this->numerador, $exponente);
        $nuevoDenominador = (int)pow($this->denominador, $exponente);
        return new Fraccion($nuevoNumerador, $nuevoDenominador);
    }

    /**
     * Convierte la fracción a una representación en porcentaje.
     * @return string El valor en formato "n.n%"
     */
    public function aPorcentaje(): string {
        $porcentaje = ($this->numerador / $this->denominador) * 100;
        return number_format($porcentaje, 2) . '%';
    }
}