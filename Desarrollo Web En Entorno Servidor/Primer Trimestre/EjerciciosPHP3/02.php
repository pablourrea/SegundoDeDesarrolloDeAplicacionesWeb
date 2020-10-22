<!DOCTYPE html>
<!--
    2- Crear un array que almacene 5 cadenas con el nombre de periódicos y sus enlaces para acceder. 
    El array será asociativo con el nombre del periódico como clave y su URL como valor.

    $medios =  ["El Pais" => "https://www.elpais.com", "El Mundo" => "https://www.elmundo.es"….

    Mostrar un lista html con cinco hiperenlaces a la URL de los diarios
        • El País
        • El Mundo
        • El Abc 
-->
<html>
	<head>
		<title>Ejercicio 2 (3)</title>
	</head>
	<body>
		<?php
		  //--------------------
		  $panfletos = array();
		  $panfletos = ["El País" => "https://elpais.com", "El Mundo" => "https://www.elmundo.es", "ABC" => "https://www.abc.es", "Okdiario" => "https://okdiario.com", "Mediterráneo Digital" => "https://www.mediterraneodigital.com"];
		  //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		  echo "<ul>";
		  foreach($panfletos as $clave => $valor){
		      echo "<li><a href='".$valor."'>".$clave."</a></li>";
		  }
		  echo "</ul>";
		?>
	</body>
</html>