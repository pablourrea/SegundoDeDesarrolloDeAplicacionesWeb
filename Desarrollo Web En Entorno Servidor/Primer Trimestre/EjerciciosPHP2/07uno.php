<?php
function recoge($var, $m = "")
{
    if (!isset($_REQUEST[$var])) {
        $tmp = (is_array($m)) ? [] : "";
    } elseif (!is_array($_REQUEST[$var])) {
        $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
    } else {
        $tmp = $_REQUEST[$var];
        array_walk_recursive($tmp, function (&$valor) {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
        });
    }
    return $tmp;
}

$numero = recoge("numero");

$numeroOk = false;

$numeroMinimo = 1;
$numeroMaximo = 20;

if ($numero == "") {
    print "  <p class=\"aviso\">No ha escrito el número de tablas.</p>\n";
    print "\n";
} elseif (!is_numeric($numero)) {
    print "  <p class=\"aviso\">No ha escrito el número de tablas como número.</p>\n";
    print "\n";
} elseif (!ctype_digit($numero)) {
    print "  <p class=\"aviso\">No ha escrito el número de tablas "
        . "como número entero positivo.</p>\n";
    print "\n";
} elseif ($numero < $numeroMinimo || $numero > $numeroMaximo) {
    print "  <p class=\"aviso\">El número de tablas debe estar entre "
        . "$numeroMinimo y $numeroMaximo.</p>\n";
    print "\n";
} else {
    $numeroOk = true;
}

if ($numeroOk) {
    $paso = ($numero > 1) ? 255 / ($numero - 1) : 0;
    for ($k = 0; $k < $numero; $k++) {
        print "  <table class=\"conborde\">\n";
        print "    <caption>Tabla nº" . (1 + $k) . "</caption>\n";
        print "    <tbody>\n";
        for ($i = 0; $i < $numero; $i++) {
            print "      <tr>\n";
            for ($j = 0; $j < $numero; $j++) {
                print "        <td style=\"background-color:rgb("
                    . round($k * $paso) . "," . round($i * $paso) . ","
                    . round($j * $paso) . ")\" title=\"R:" . round($k * $paso)
                    . " G:" . round($i * $paso) . " B:" . round($j * $paso)
                    . "\"></td>\n";
            }
            print "      </tr>\n";
        }
        print "    </tbody>\n";
        print "  </table>\n";
        print "\n";
    }
}

?>