<?php

function FUN($x)
{
    return exp($x - 1) - 1 / ($x + 1);
}

function Biseccion()
{
    // MÉTODO DE BISECCIÓN EN EL INTERVALO [a, b]

    $a = 0; // Intervalo inferior.
    $b = 1; // Intervalo superior.
    $n = 1; // Inicializa el número de iteraciones.
    $es = 0.05; // Criterio de tolerancia.
    $xr = 0.0; // Aproximación
    $Ar = 0.0; // Valor aproximación anterior.
    $fa = 0.0;
    $fb = 0.0;
    $fx = 0.0;
    $ff = 0.0;
    $ea = 0.0; // Error de aproximación.

    $a = (float)$_POST['intervalo_inferior']; // Assuming input for intervalo inferior from a form.
    $b = (float)$_POST['intervalo_superior']; // Assuming input for intervalo superior from a form.
    $es = (float)$_POST['criterio_tolerancia']; // Assuming input for criterio de tolerancia from a form.

    $output = ''; // Store the output to display the table later.

    if (FUN($a) * FUN($b) < 0) {

        $output .= "<table><tr><th>n</th><th>a</th><th>b</th><th>xr</th><th>fa</th><th>fb</th><th>fx</th><th>ff</th><th>ea</th></tr>";

        do {
            $xr = ($a + $b) / 2; // Aproximación

            // Evaluate in the function
            $fa = FUN($a);
            $fb = FUN($b);
            $fx = FUN($xr);

            // Signo de las imágenes
            $ff = $fa * $fx;

            // Error de aproximación.
            $ea = abs(($xr - $Ar) / $xr) * 100;

            // Append values to the output table.
            $output .= "<tr><td>$n</td><td>$a</td><td>$b</td><td>$xr</td><td>$fa</td><td>$fb</td><td>$fx</td><td>$ff</td><td>$ea</td></tr>";

            if ($ff == 0) {
                break;
            }

            if ($ff < 0) { // Evalúa para determinar el subintervalo
                $b = $xr;
            } else {
                $a = $xr;
            }

            $Ar = $xr;
            $n++; // Contador de iteraciones
        } while ($ea > $es);

        $output .= "</table>";

    } else {
        $output = "Error, f(x) Discontinua o no hay raíces en el intervalo dado.";
    }

    return $output;
}

// Example usage:
// Assuming you have a form with 'intervalo_inferior', 'intervalo_superior', and 'criterio_tolerancia' inputs submitted via POST method.
// The result will be stored in the $result variable.
$result = Biseccion();
echo $result;
