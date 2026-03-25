<?php
class Alumno {
    private $nombre;
    private $apellidos;
    private $numeroControl;
    public function setNombre($nombre) {
     $this->nombre = $nombre;
    }
    public function setApellidos($apellidos) {
     $this->apellidos = $apellidos;
    }
    public function setNumeroControl($numeroControl) {
      $this->numeroControl = $numeroControl;
    }

    //reto 1
    public function asignarDatos($nombre, $apellidos, $numeroControl) {
     $this->nombre = $nombre;
     $this->apellidos = $apellidos;
     $this->numeroControl = $numeroControl;
    }
    // reto3
    public function generarCorreo() {
        $usuario = strtolower(str_replace(' ', '', $this->nombre));
        return $usuario . "." . $this->numeroControl . "@correo.edu.mx";
    }

    public function mostrarDatos() {
        echo "<strong>Nombre:</strong> " . $this->nombre . "<br>";
        echo "<strong>Apellidos:</strong> " . $this->apellidos . "<br>";
        echo "<strong>Número de Control:</strong> " . $this->numeroControl . "<br>";
        echo "<strong>Correo Institucional:</strong> " . $this->generarCorreo() . "<br><hr>";
    }
}
?>