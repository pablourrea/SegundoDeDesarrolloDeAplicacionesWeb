<?php
// Array con nombres
$a[1] = "Ana";
$a[2] = "Belén";
$a[3] = "Carmen";
$a[4] = "Daniel";
$a[5] = "Eva";
$a[6] = "Francisco";
$a[7] = "Germán";
$a[8] = "Hugo";
$a[9] = "Iván";
$a[10] = "Juan";
$a[11] = "Kitty";
$a[12] = "Luis";
$a[13] = "Nadia";
$a[14] = "Ontario";
$a[15] = "Pepe";

$a[16] = "Jaime";
$a[17] = "Jacinto";
$a[18] = "José";


// Parámetro para buscar
$q = $_REQUEST["q"];

$resultado = "";

// Comprobación
if ($q !== "") {
    $q = strtolower($q);
    $tam=strlen($q);
    foreach($a as $nombre) {
        if (stristr($q, substr($nombre, 0, $tam))) {
            if ($resultado === "") {
                $resultado = "<p>".$nombre."<p>";
            } else {
                $resultado .= "<p>".$nombre."<p>";
            }
        }
    }
}

// Mensaje si no hay resultados
echo $resultado === "" ? "no existen coincidencias " : $resultado;
?>