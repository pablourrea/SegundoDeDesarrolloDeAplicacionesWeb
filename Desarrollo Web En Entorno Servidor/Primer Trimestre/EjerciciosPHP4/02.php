<?php
	$operando1 = $_GET['operando1'];
	$operando2 = $_GET['operando2'];
	$operador = $_GET['operador'];
	
	if($operador == "+"){
		$solucion = $operando1 + $operando2;
	}else if($operador == "-"){
		$solucion = $operando1 - $operando2;
	}else if($operador == "*"){
		$solucion = $operando1 * $operando2;
	}else if($operador == "/"){
		$solucion = $operando1 / $operando2;
    }

    if($operador == "+"){
		echo "Resultado: ".$solucion;
	}else if($operador == "-"){
		$binario=decbin($numero);
        echo 'Resultado: '.$binario;
	}else if($operador == "*"){
		$solucion = $operando1 * $operando2;
	}else if($operador == "/"){
		$solucion = $operando1 / $operando2;
	}
	
?>