<!DOCTYPE html>
<!--
    3- Elegir a azar uno de los cinco medios y  mostrar el enlace seleccionado.
    "El Medio recomendado es: El MundoToday"  
-->
<html>
	<head>
		<title>Ejercicio 3 (3)</title>
	</head>
	<body>
		<?php 
    		//--------------------
    		$panfletos = array();
    		$panfletos = ["El País" => "https://elpais.com", "El Mundo" => "https://www.elmundo.es", "ABC" => "https://www.abc.es", "Okdiario" => "https://okdiario.com", "Mediterráneo Digital" => "https://www.mediterraneodigital.com"];
    		//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    		$panfleto_num = array();
    		$i = 0;
    		foreach($panfletos as $valor){
    		  $panfleto_num[$i] = $valor;
    		  $i++;
    		}
    		$panfleto_select = random_int(0, count($panfletos)-1);
    		
    		echo "El Panfleto pseudoperiodístico recomendado es <a href='".$panfleto_num[$panfleto_select]."'>".array_search($panfleto_num[$panfleto_select], $panfletos)."</a>.";
		?>
	</body>
</html>