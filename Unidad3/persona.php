<?php
class Persona {
 // Propiedades con diferentes niveles de acceso
 public $nombre = "Carlos";
 private $edad = 25;
 protected $dni = "12345678X";
 // Método para acceder a las propiedades dentro de la clase
 public function mostrarDatos() {
 echo "Nombre: " . $this->nombre . "<br>";
 echo "Edad: " . $this->edad . "<br>";
 echo "DNI: " . $this->dni . "<br>";
 }
 public function getEdad(){
     return $this->edad;
 }
 public function getDni(){
     return $this->dni;
 }
 public function setEdad($edad){
     $this->edad = $edad;
 }
 public function setDni($dni){
     $this->dni = $dni;
 }
}
?>