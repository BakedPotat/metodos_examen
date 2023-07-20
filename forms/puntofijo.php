<!DOCTYPE html>
<html>
<head>
    <title>Resultados de Newton-Raphson</title>
</head>
<body>
    <h1>Resultados de Newton-Raphson</h1>
    <?php
function FUN($x) {
    return exp(-$x);
}

function PuntoFijo() {
    $n = 1;
    $ea;
    $es;
    $xi;
    $Ar;
    $gx;
    
    $ea = 0;
    $es = $_POST['es']; // Criterio de tolerancia (ajústalo según tus necesidades)
    $xi = $_POST['xi']; // Valor inicial de xi desde el formulario HTML
    $Ar = 0;
    $gx = 0;
    
    // Salida HTML
    echo '<table>';
    echo '<tr><th>n</th><th>xi</th><th>gx</th><th>ea</th></tr>';
    
    do {
        $gx = FUN($xi);
        $ea = abs(($gx - $Ar) / $gx) * 100;
        $Ar = $gx;
        
        // Mostrar los valores en la tabla
        echo '<tr>';
        echo '<td>' . $n . '</td>';
        echo '<td>' . $xi . '</td>';
        echo '<td>' . $gx . '</td>';
        echo '<td>' . $ea . '</td>';
        echo '</tr>';
        
        $xi = $gx;
        $n++;
        
    } while ($ea > $es);
    
    echo '</table>';
}

// Comprobar si se envió el formulario y llamar a la función Newton()
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    PuntoFijo();
}

?>

</body>
</html>