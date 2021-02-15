<?php

session_start();

include_once 'AccesoDatos.php';

$_SESSION["codcliente"] = null;
$_SESSION["nombre"] = $_GET['nombre'];

function mostrarDatos(){
    
    $titulos = [ "Producto","Precio"];
    $msg = "<table>\n";
    $precioTotal = 0;
    // Identificador de la tabla
    $msg .= "<tr>";
    for ($j=0; $j < count($titulos); $j++){
        $msg .= "<th>$titulos[$j]</th>";
    }  
    $msg .= "</tr>";
    $auto = $_SERVER['PHP_SELF'];
    $db = AccesoDatos::initModelo();
    $tpedidos = $db->getPedidos();
    if ( count($tclientes) == null){
        $mensaje = "No existen pedidos para ese cliente.";
        unset($tclientes);
    } else {
        foreach ($tpedidos as $pedido) {
            $msg .= "<tr>";
            $msg .= "<td>$pedido->producto</td>";
            $msg .= "<td>$pedido->precio</td>";
            $msg .="</tr>\n";
            $precioTotal += $pedido->precio;

        }
    }
    $msg .= "</table>";
   
    return $msg;    
}

// Cargo la vista 
include_once 'vistapedidos.php';
?>
