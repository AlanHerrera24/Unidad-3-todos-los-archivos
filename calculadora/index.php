<?php
require_once "claseTienda.php";

$resultado = "";
$error = "";

if ($_POST) {
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];

    $tienda = new Tienda();

    // Validación
    if(!$tienda->validarPrecio($precio)){
        $error = "El precio no puede ser negativo o inválido.";
    } else {
        $descuento = $tienda->calcularDescuento($precio);
        $total = $tienda->calcularTotal($precio, $descuento);
        $mensaje = $tienda->mensajeDescuento($descuento);

        $resultado = "
        <div class='resultado'>
            <h3>Resultado</h3>
            <p><strong>Producto:</strong> $producto</p>
            <p><strong>Precio original:</strong> $$precio</p>
            <p><strong>Descuento:</strong> $$descuento</p>
            <p><strong>$mensaje</strong></p>
            <p class='total'>Total a pagar: $$total</p>
        </div>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Descuentos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <h2>Calculadora de Descuentos</h2>

    <form method="POST">
        <label>Nombre del producto</label>
        <input type="text" name="producto" required>

        <label>Precio:</label>
        <input type="number" name="precio" required>

        <button type="submit">Calcular</button>
    </form>

    <!-- Mostrar error -->
    <?php if($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <!-- Mostrar resultado -->
    <?php echo $resultado; ?>

</body>
</html>