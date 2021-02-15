<?php 
include_once 'Pedido.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>e-comercio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
    .central-div-background {
        margin: auto;
        margin-top: 10%;
        width: 600px;
        background-color: rgb(220, 220, 220);
        text-align: center;
        font-style: italic;
        font-size: 25px;
        color: rgb(0, 0, 255);
        padding: 30px;
        border-style: solid;
        border-width: 5px;
        border-radius: 5px;
        border-color: rgb(0, 0, 255);
    }
    
    .title-class-access {
        margin-bottom: 30px;
        font-size: 30px;
        font-weight: 900;
    }
</style>

<body>

    <div class="central-div-background">
        <?php
        	// Controlador de sesion
        	echo "<div class=\"welcome-div\">Bienvenido ".$_SESSION["nombre"].".</br>";

        	// Controlador de cookies
        	if (!isset($_COOKIE['visitas'])) $_COOKIE['visitas'] = 0;
        	$visitas = $_COOKIE['visitas'] + 1;
        	setcookie('visitas',$visitas,time()+3600*24*365);
        	if ($visitas > 1) {
        		echo("Esta es tu visita número $visitas desde este dispositivo.</div>");
        	} else {
        		// Primera visita
        		echo('Bienvenido a la página, esta es tu primera visita.</div>');
        	}
        ?>

        <?php
            // Muestra la tabla
            mostrarDatos();
        ?>

        <?php
            // Destruye la sesión
            session_destroy();
        ?>

    </div>

</body>

</html>
