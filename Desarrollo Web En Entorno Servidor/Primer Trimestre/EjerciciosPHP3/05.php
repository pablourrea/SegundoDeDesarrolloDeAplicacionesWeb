<!DOCTYPE html>
<!--
    5-Realizar un programa en PHP que muestre un posible resultado de la bonoloto: 
    Se presentarán 6 números obtenidos aleatoriamente en el rango de 1 a 49 (ambos inclusives) 
    Los 5 primeros forman la jugada ganadora y deberán presentar ordenados de menor a mayor en una tabla html; 
    el sexto es el número complementario.  
    
    Por supuesto los números no pueden repetirse.
    
    +---+---+----+----+----+--------------------+
    | 3 | 8 | 23 | 34 | 45 | Complementario: 15 |
    +---+---+----+----+----+--------------------+    
-->
<html>
	<head>
		<title>Ejercicio 5 (3)</title>
		<style type="text/css">
		    table{
                border-collapse: collapse;            		      
		    }
		    td{
		        border: 2px solid black;
		        padding: 10px;
		    }
		</style>
	</head>
	<body>
		<?php
		    $numeros = array();
            //Introduce seis valores aleatorios y filtra para evitar que sean iguales:
		    for($i = 0; $i < 6; $i++){
		        $num = random_int(1, 49);
		        while(array_search($num, $numeros)){
                    $num = random_int(1, 49);		              
		        }
		        $numeros[$i] = $num;
		    }
		    //-----------------------------------------------------------------------
		    echo "
                <center>
                    <table>
                        <tr>
            ";
		    for($i = 0; $i < count($numeros); $i++){
		        if($i != count($numeros)-1){
		            echo "<td>".$numeros[$i]."</td>";
		        }else{
		            echo "<td>Complementario: ".$numeros[$i]."</td>";
		        }
		    }
		    echo "
                        </tr>
                    </table>
                </center>
            ";
        ?>
	</body>
</html>