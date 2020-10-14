<?php
    function sumar($valor1, $valor2, &$resultado){
        $resultado = $valor1 + $valor2;
        return $resultado;
    }
    function restar($valor1, $valor2, &$resultado){
        $resultado = $valor1 - $valor2;
        return $resultado;
    }
    function multiplicar($valor1, $valor2, &$resultado){
        $resultado = $valor1 * $valor2;
        return $resultado;
    }
    function dividir($valor1, $valor2, &$resultado){
        $resultado = $valor1 / $valor2;
        return $resultado;
    }
    function modulo($valor1, $valor2, &$resultado){
        $resultado = $valor1 % $valor2;
        return $resultado;
    }
    function potencia($valor1, $valor2, &$resultado){
        $resultado = $valor1 ** $valor2;
        return $resultado;
    }
?>