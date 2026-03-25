<?php

class Tienda {

    // Validar precio
    public function validarPrecio($precio){
        if(!is_numeric($precio) || $precio < 0){
            return false;
        }
        return true;
    }

    // Calcular descuento
    public function calcularDescuento($precio){
        if($precio >= 1000){
            return $precio * 0.20;
        } elseif($precio >= 500){
            return $precio * 0.10;
        } else{
            return 0;
        }
    }

    // Calcular total
    public function calcularTotal($precio, $descuento){
        return $precio - $descuento;
    }

    // Mensaje de descuento
    public function mensajeDescuento($descuento){
        if($descuento == 0){
            return "No se aplicó ningún descuento.";
        } else{
            return "Se aplicó un descuento de $$descuento.";
        }
    }
}
?>