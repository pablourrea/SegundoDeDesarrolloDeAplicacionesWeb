<?php
define ('NUMDADOS',5);
$tcharDados = [ 1=> "&#9856;", 2=>"&#9857;", 3=> "&#9858;", 4=>"&#9850;", 5=>"&#9860;",  6=>"&#9861;"];

//Funcion que genera los dados
function generaDados($numdados):array {
    $valores = []; 
    for ($i = 0; $i < $numdados; $i++){
        $valores[]= random_int(1, 6);
    }
    return $valores;
}

//Funcion que suma los dados
function calculaPuntos($dados):int{
    $sum = 0;
    foreach ($dados as $valor ){
        $sum += $valor;
    }
    $sum = $sum - max($dados)- min($dados);
    return $sum;
}

//Funcion que muestra un mensaje con el ganador
function generaMensaje ($puntos1,$puntos2):string {
    $msg = "";
    if ($puntos1 == $puntos2){
        $msg = " Han empatado los jugadores";
    } else {
        if ($puntos1 > $puntos2){
            $msg = " Ha Ganado el Jugador 1";
        } else {
            $msg = " Ha Ganado el Jugador 2";
        }
    }
    return $msg;
}

//Funcion que genera imagenes de los dados
function generaImagenes ( $dados): string{
    $msg ="";
    global $tcharDados;
    foreach ($dados as $valor ){
        $msg .= "<span style='font-size:100px;'>".$tcharDados[$valor]."</span>";
    }
    return $msg;
}

//Programa principal
$dadosJugador1 = generaDados(NUMDADOS);
$dadosJugador2 = generaDados(NUMDADOS);
$puntosJugador1 = calculaPuntos($dadosJugador1);
$puntosJugador2 = calculaPuntos($dadosJugador2);
$msgGanador    = generaMensaje($puntosJugador1,$puntosJugador2);

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Juego de los dados</title> 
</head>

<body>
  <h1>Juego de los dados</h1>
  <table>
    <tbody>
      <tr>
        <th>Jugador 1</th>
        <td style="padding: 10px; background-color: red;">
          <?php echo generaImagenes($dadosJugador1);?>
          
        </td>
        <th> <?= $puntosJugador1; ?> puntos</th>
      </tr>
      <tr>
        <th>Jugador 2</th>
        <td style="padding: 10px; background-color: blue;">
           <?=generaImagenes($dadosJugador2);?>
          
        </td>
        <th> <?= $puntosJugador2 ?> puntos</th>
      </tr>
      <tr>
        <th>Resultado</th>
        <td><?= $msgGanador ?></td>
      </tr>
    </tbody>
  </table>
</body>

</html>