<!DOCTYPE html>
<!--
	6- Generar un número entre 1 y 10  y mostrar una muralla de  asteriscos con tantas almenas como indique el usuario. 
	Nota: una almena está formada dos filas de  cuatro asterisco,  y entre almena y almena hay un  espacio.

	2º Versión: La muralla se genera con  imágenes de ladrillos, de piedras o algo similar.	

	Ej.-
	El usuario introduce: 3
	El programa mostrará: 

	**** **** ****
	**** **** ****
	**************

	El usuario introduce: 5
	El programa mostrará:

	**** **** **** **** ****
	**** **** **** **** ****
	************************
-->
<html>

	<head>
		<title>Ejercicio 6</title>
		<style>
			body{
				background-color: white;
			}
			img{
				margin: 3px;
			}
		</style>
	</head>

	<body>

		<?php
			function generarAlmenas($n){
				$num_lad_inf = (4*$n)+($n-1);
				$ladrillo = "*";
				$espacio = " ";

				$rep = false;
				for($a = 1; $a <= $n; $a++){
					if($a < $n){
						echo $ladrillo.$ladrillo.$ladrillo.$ladrillo.$espacio;
					}else{
						echo $ladrillo.$ladrillo.$ladrillo.$ladrillo;
					}
					if($a == $n && $rep == false){
						$a = 0;
						$rep = true;
						echo "<br>";
					}
				}
				echo "<br>";
				for($l = 1; $l <= $num_lad_inf; $l++){
					echo $ladrillo;
				}
			}	

			$almenas = random_int(1, 10);
			generarAlmenas($almenas);
		?>

	</body>

</html>