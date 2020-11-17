<!DOCTYPE html>
<html lang="es"> 

<head>
    <meta charset="utf-8">
    <title>MiniCasino en PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    
        <h1>BIENVENIDO AL CASINO</h1>

        <?php
            //COOKIES
            //Establecer cookies y contador de visitas hechas por el usuario mediante cookies
            if ( isset( $_COOKIE["visitas"] ) ) { //Cookies visitas
                setcookie("visitas", $_COOKIE["visitas"] + 1, time() + 3600 * 24);
            } else {
                setcookie("visitas", 1, time() + 3600 * 24);
            }

            if(@$_COOKIE["visitas"] == 1) {
                echo    "<form action=\"minicasino.php\" method=\"post\">
                            <p>Introduzca el dinero con el que va a jugar: <input type=\"number\" name=\"dinero\"></p>
                            <p><input type=\"submit\" value=\"Introducir Cantidad\"></p>
                        </form>";
                        setcookie("dinero", 0, time() + 3600 * 24);//Cookies dinero
            } else {
                echo    "<form action=\"minicasino.php\" method=\"post\">
                            <p>Dispone de ".$_COOKIE['dinero']." para jugar.</p>
                            <p>Cantidad a apostar: <input type=\"number\" name=\"cantidadaapostar\"></p>
                            <p>
                                Tipo de apuesta:
                                <input type=\"radio\" name=\"apuesta\" value=\"par\" <?php if (isset(\$apuesta) && \$apuesta==\"par\") echo \"checked\";?>Par
                                <input type=\"radio\" name=\"apuesta\" value=\"impar\"<?php if (isset(\$apuesta) && \$apuesta==\"impar\") echo \"checked\";?>Impar
                            </p>
                            <p>
                                <input type=\"submit\" value=\"Apostar Cantidad\" name=\"apostar\">
                                <input type=\"submit\" value=\"Abandonar Casino\" name=\"abandonar\">
                            </p>
                        </form>";
            }

            //'IF' que activa los botones
            if(isset($_POST["abandonar"])) {
                setcookie('visitas', time() - 3600);
            } elseif(isset($_POST["apostar"])) {
                dinerosuficiente();
            }

            //Comprobar si el dinero apostado es inferior o igual a l apostado y redirigir a la funcion del juego
            function dinerosuficiente(){
                if($_POST["cantidadaapostar"] < @$_COOKIE['dinero']){
                    echo "<p style=\"color:red;\">No dispone de fichas suficientes</p>";
                } else {
                    casino();
                }
            }

            //Juego
            function casino() {
                $num = rand(0,1);
                $ganador = null;
                $cantidadaapostar = $_POST["cantidadaapostar"];
                $apuesta = $_POST["apuesta"];
                $ganancias = $cantidadaapostar * 2;

                //Establecer par e impar del random a la variable $ganador
                if($num == 0){
                    $ganador = "par";
                } else {
                    $ganador = "impar";
                }

                //Mensaje final de ganador o perdedor junto con las ganancias o perdidas
                if($apuesta == $ganador) {
                    if ( isset( $_COOKIE['dinero'] ) ) {
                        setcookie('dinero', $_COOKIE['dinero'] + $ganancias, time() + 3600 * 24);
                        echo "<p style=\"color:green;\">¡Has ganado ".$ganancias."!</p>";
                    }
                } else {
                    echo "<p style=\"color:red;\">¡Has perdido ".$cantidadaapostar."!</p>";
                }
            }
        ?>

</body>

</html>