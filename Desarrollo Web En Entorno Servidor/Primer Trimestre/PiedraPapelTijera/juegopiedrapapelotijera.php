<!DOCTYPE html>
<html>

	<head>

        <title>Piedra, Papel y Tijera</title>
        <meta charset="UTF-8">
        <meta name="author" content="Pablo Urrea Cabello">
        <style>
            body{
                text-align: center;
            }
            table{
                padding: 30px;
            }
        </style>

    </head>

    <body>

    	<?php

    	   define("piedra_j1", "&#x1F91C");
    	   define("piedra_j2", "&#x1F91B");
    	   define("papel", "&#x1F91A");
    	   define("tijera", "&#x1F596");
    	   //------------------------------
    	   $j1 = random_int(1, 3);
    	   $j2 = random_int(1, 3);
    	   
    	   switch($j1){
    	       case 1:
    	           $j1 = (string)piedra_j1;
    	           break;
    	       case 2:
    	           $j1 = (string)papel; 
    	           break;
    	       case 3:
    	           $j1 = (string)tijera;
    	           break;
    	   }
    	   switch($j2){
    	       case 1:
    	           $j2 = (string)piedra_j2;
    	           break;
    	       case 2:
    	           $j2 = (string)papel;
    	           break;
    	       case 3:
    	           $j2 = (string)tijera;
    	           break;
    	   }
    	   $ganador = "";
    	   
    	   if($j1 == $j2){
    	       $ganador = "¡Empate!";
    	   }elseif($j1 == piedra_j1 && $j2 == piedra_j2){
    	       $ganador = "¡Empate!";
    	   }else{

			    switch($j1){
					case piedra_j1:
						if($j2 == papel){
							$ganador = "¡Ha ganado el Jugador 2!";
						}elseif($j2 == tijera){
							$ganador = "¡Ha ganado el Jugador 1!";
						}
						break;
					case papel:
						if($j2 == piedra_j2){
							$ganador = "¡Ha ganado el Jugador 1!";
						}elseif($j2 == tijera){
							$ganador = "¡Ha ganado el Jugador 2!";
						}
						break;
					case tijera:
						if($j2 == piedra_j2){
							$ganador = "¡Ha ganado el Jugador 2!";
						}elseif($j2 == papel){
							$ganador = "¡Ha ganado el Jugador 1!";
						}
						break;
			    }
    	   }
    	?>

    	<h1>¡Piedra, papel y tijera!</h1>

		<br>

    	<p>Actualice la página (F5) para mostrar otra partida.</p>

		<br>

		<center>

			<table>

				<tr>
					<th>Jugador 1</th>
					<th>Jugador 2</th>
				</tr>
				<tr>
					<td><span style="font-size: 7rem"><?php echo $j1;?></span></td>
					<td><span style="font-size: 7rem"><?php echo $j2;?></span></td>
				</tr>
				<tr>
					<th colspan="2"><?php echo $ganador; ?></th>
				</tr>
				
			</table>

		</center>

    </body>

</html>