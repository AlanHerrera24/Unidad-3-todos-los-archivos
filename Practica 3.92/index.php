<?php
require_once 'clase_fraccion.php';

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $n1 = (int)$_POST['n1'];
        $d1 = (int)$_POST['d1'];
        $n2 = (int)$_POST['n2'];
        $d2 = (int)$_POST['d2'];
        $op = $_POST['operacion'];

        $f1 = new Fraccion($n1, $d1);
        
        // Creamos f2 solo si no es porcentaje (para evitar errores si d2 es 0 en esa op)
        if ($op !== "porcentaje") {
            $f2 = new Fraccion($n2, $d2);
        }

        switch ($op) {
            case "sumar":
                $res = $f1->sumar($f2);
                $res->simplificar();
                $resultado = "Resultado: " . $res;
                break;
            case "restar":
                $res = $f1->restar($f2);
                $res->simplificar();
                $resultado = "Resultado: " . $res;
                break;
            case "multiplicar":
                $res = $f1->multiplicar($f2);
                $res->simplificar();
                $resultado = "Resultado: " . $res;
                break;
            case "dividir":
                $res = $f1->dividir($f2);
                $res->simplificar();
                $resultado = "Resultado: " . $res;
                break;
            case "potencia":
                // Usamos n2 como el exponente
                $res = $f1->potencia($n2);
                $res->simplificar();
                $resultado = "Resultado: " . $res;
                break;
            case "porcentaje":
                $resultado = "Resultado en porcentaje: " . $f1->aPorcentaje();
                break;
        }

    } catch (Exception $e) {
        $resultado = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Fracciones</title>
</head>
<body>
    <h2>Calculadora de Fracciones</h2>

    <form method="POST">
        <label>El formato debe ser: Numerador / Denominador</label><br><br>
        
        Fracción 1:
        <input type="number" name="n1" value="<?php echo $_POST['n1'] ?? ''; ?>" required> /
        <input type="number" name="d1" value="<?php echo $_POST['d1'] ?? ''; ?>" required><br><br>

        Fracción 2 / Exponente:
        <input type="number" name="n2" value="<?php echo $_POST['n2'] ?? ''; ?>"> /
        <input type="number" name="d2" value="<?php echo $_POST['d2'] ?? '1'; ?>"><br><br>

        Operación:
        <select name="operacion">
            <option value="sumar">Sumar</option>
            <option value="restar">Restar</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
            <option value="potencia">Potencia (F1 elevado a n2)</option>
            <option value="porcentaje">Convertir F1 a Porcentaje</option>
        </select><br><br>

        <button type="submit">Calcular</button>
    </form>

    <br>
    <b><?php echo $resultado; ?></b>

</body>
</html>