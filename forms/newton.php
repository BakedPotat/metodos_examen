<!DOCTYPE html>
<html>
<head>
    <title>Resultados de Newton-Raphson</title>
</head>
<body>
    <h1>Resultados de Newton-Raphson</h1>
    <?php
  // Funciones FUN1(), FUN2(), FUN3(), FUN4() adaptadas a PHP
  //function FUN1($x) {
    //return exp(-$x) - $x;
//}

//function FUN2($x) {
   // return -exp(-$x) - 1;
//}

//function FUN3($x) {
   // return exp(-$x) - log($x);
//}

//function FUN4($x) {
 //   return -exp(-$x) - 1 / $x;
//}

 function FUN1($x) {
    return exp($x - 1) - 5 * pow($x, 3);
}

function FUN2($x) {
    return exp($x - 1) - 15 * pow($x, 2);
    //La función pow está integrada en php, funciona para poder elevar un número a una potencia pow(base, exponente)
}

// Función Newton adaptada a PHP
function Newton() {
    // Variables
    $n = 1;
    $ea;
    $es;
    $xi;
    $Ar;
    $fx;
    $fdx;
    $xr;

    $xi = $_POST['initialValue']; // valor inicial xi
    $es = $_POST['tolerance']; // Criterio de tolerancia
    $Ar = 0; // Valor anterior de aprox
    $fx = 0; // Inicializa en cero
    $fdx = 0;
    // Limpia los resultados anteriores
    // ...

    echo "<table>";
    echo "<tr><th>n</th><th>xi</th><th>fx</th><th>fdx</th><th>ea</th></tr>";

    do {
        $fx = FUN1($xi); // Uso de la Función y su derivada
        $fdx = FUN2($xi);
        $xr = $xi - ($fx / $fdx);
        $ea = abs(($xr - $Ar) / $xr) * 100;
        $Ar = $xr;

        // Mostrar los valores en la tabla
        echo "<tr>";
        echo "<td>$n</td>";
        echo "<td>$xi</td>";
        echo "<td>$fx</td>";
        echo "<td>$fdx</td>";
        echo "<td>$ea</td>";
        echo "</tr>";

        $xi = $xr;
        $n++;

        if ($n > 100) { // Máximo de iteraciones
            break;
        }
    } while ($ea > $es);

    echo "</table>";
}

// Comprobar si se envió el formulario y llamar a la función Newton()
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    Newton();
}

    ?>
</body>
</html>