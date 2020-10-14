<!DOCTYPE html>
<!-- 
  4- Realizar un programa en php que genere 50 números aleatorios entre 1 y 100 y que muestre en una tabla 
  html el valor máximo, el mínimo y la media con el siguiente formato:
  Nota: definir los valores 50 y 100 como constantes en PHP (define)
    
    +-----------------------------------------------------+
    |       Generación de 50 valores aleatorios           |
    +---------------------------------------+-------------+
    |Mínimo                                 |            2|
    +---------------------------------------+-------------+
    |Máximo                                 |           89|
    +---------------------------------------+-------------+
    |Media                                  |        45.23|
    +---------------------------------------+-------------+
-->
<html>

	<head>

        <title>Ejercicio 4</title>
        <meta charset="UTF-8">
        <style>
            table{
                border-collapse: collapse;
            }
            th{
                background-color: black; 
                color: white; 
                text-align: center; 
                padding: 10px;
            }
            tr, td{
                border: 2px solid black;
            }
            td{
                padding: 3px;
            }
        </style>
    </head>

    <body>

    	<?php 
    	   define("num_valores", 50);
    	   define("max", 100);
    	   $num_min = random_int(1, max);
    	   $num_max = 0;
    	   $suma = 0;
    	   
    	   for($i = 0; $i < num_valores; $i++){
    	       $valor = random_int(1, max);
    	       if($valor < $num_min){
    	           $num_min = $valor;
    	       }elseif($valor > $num_max){
    	           $num_max = $valor;
    	       }
    	       $suma += $valor;
    	   }
    	   $media = $suma / num_valores;
    	?>

    	<table>
    		<tr>
    			<th colspan="2">Generación de 50 valores aleatorios</th>
    		</tr>
    		<tr>
    			<td>Mínimo</td>
    			<td style="text-align: right;"><?php echo $num_min; ?></td>
    		</tr>
    		<tr>
    			<td>Máximo</td>
    			<td style="text-align: right;"><?php echo $num_max; ?></td>
    		</tr>
    		<tr>
    			<td>Media</td>
    			<td style="text-align: right;"><?php echo $media; ?></td>
    		</tr>
    	</table>
    </body>
	
</html>