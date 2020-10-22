<!DOCTYPE html>
<!--
    1. Rellenar un array con 20 números aleatorios entre 1 y 10 y mostrar el contenido del array  
    mediante una tabla de una fila en HMTL. Mostrar a continuación el valor máximo, el mínimo y el  
    valor que mas veces se repite. (Nota definir funciones para cada caso) 
-->
<html>
	<head>
		<title>Ejercicio 1 (3)</title>
		<style>
		  table{
		      border-collapse: collapse;
		  }
		  tr, td, th{
		      border: 2px solid black;
		      padding: 10px;
		  }
		</style>
	</head>
	<body>
		<?php
		  function max_num(&$array){
		      rsort($array);
		      $resultado = $array[0];
		      return "-Valor máximo: $resultado <br>";
		  }
		  function min_num(&$array){
		      sort($array);
		      $resultado = $array[0];
		      return "-Valor mínimo: $resultado <br>";
		  }
		  /*function mas_rep(&$array){
		      $array_rep = array();
		      for($i = 0; $i < count($array); $i++){
		          foreach($array as $valor){
		              if(!array_search($valor, $array_rep)){
		                  $array_rep($valor, );
		              }
		          }
		      }
		  }*/
		  //----------------------
		  $array_num = array();
		  //----------------------
		  echo "
            <table>
                <tr>
                    <th colspan='20' style='text-align: center;'>Tabla de números</th>
                </tr>
                <tr>
          ";
		  for($i = 0; $i < 20; $i++){
		      $array_num[$i] = random_int(1, 10);
		      echo "<td>".$array_num[$i]."</td>";
		  }
          echo "
                </tr>  
            </table>
          ";
          echo "<br><br>";
          echo max_num($array_num);
          echo min_num($array_num);
          //echo mas_rep($array_num);
		?>
	</body>
</html>