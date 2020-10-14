<!DOCTYPE html>
<!--
 2- Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10, mostrar su suma, su resta, 
 su división, su multiplicación, su módulo y su potencia (ciclo for). 
 Crea un archivo llamado funcionesvar.php donde estén definidas las cinco operaciones: suma, resta, división, producto, módulo y potencia. 
 Incluir ese fichero dentro de fichero principal (require_once) y llamar  a las funciones para obtener el resultado.

    Ejemplo
    function calSuma( $valor1, $valor2){
      $resultado = $valor1 + valor$;
      return $resultado;
    }
    
    Ejemplo de uso de la función:
    
    $valor = calSuma(9,10); // devolverá el valor 19
    
    1º Número : 5  
    2º Número : 2
     
    5+3  = 7
    5-2  = 3
    5*2  = 10
    5/ 2 = 2.5
    5%2  = 1
    5**2 = 25
	




¡IMPORTANTE!

Los números para este ejercicio van a ser generados automaticamente con una
función random_intya que en el momento de la realización de este ejercicio
no se habia explicado en clase como introducir números por pantalla.  
-->
<html>

	<head>
		<title>Ejercicio 2</title>
	</head>

	<body>

    	<?php
    	   $var1 = random_int(1, 10);
    	   $var2 = random_int(1, 10);
    	   
    	   require_once("funcionesvar.php");
    	   
    	   echo "Primer Número: $var1 <br> Segundo Número: $var2 <br><br>";
    	   
    	   for($i = 0; $i < 4; $i++){
    	       switch($i){
    	           case 0:
    	               
    	               break;
    	           case 1:
    	               break;
    	           case 2:
    	               break;
    	           case 3:
    	               break;
    	           case 4:
    	               break;
    	       }
    	   }
        ?>

    </body>

</html>