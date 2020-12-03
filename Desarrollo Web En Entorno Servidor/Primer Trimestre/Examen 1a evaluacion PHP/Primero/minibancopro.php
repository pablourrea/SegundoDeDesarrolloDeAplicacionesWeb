<!DOCTYPE html>
<html>

<?php

    //Incluye datos del archivo "minibanco.php"
    include 'minibanco.php';

    //Comprueba si hay una variable de sesion de saldo y si no la hay se establece el saldo en 0
    if (isset($_SESSION['saldo'])) {
        //No hace nada
    } else{
        //Establece el saldo en 0
        $_SESSION['saldo'] = 0;
    }

?>

<head>
    <meta charset="UTF-8">
    <title>MiniBankPro</title>
</head>

<body>

    <?php

        //Recoge el valor de la orden de submit
        @$_SESSION['boton'] = $_POST['Orden'];

        //Establece el mensaje de operacion realizada
        $msg = "Operación realizada.";

        //Recorre los valores de la orden de submit y los procesa
        switch ($_SESSION['boton']) {
            case 'Ingreso':
                //Añade el importe recogido a la variable de sesión "saldo"
                $_SESSION['saldo'] = $_SESSION['saldo'] + $_POST['importe'];
                echo $msg;
                break;

            case 'Reintegro':
                //Resta el importe recogido a la variable de sesión "saldo"
                $_SESSION['saldo'] = $_SESSION['saldo'] - $_POST['importe'];
                echo $msg;
                break;

            case 'Ver saldo':
                //Muestra el saldo disponible
                echo $_SESSION['saldo'];
                break;

            case 'Terminar':
                //Destruye la sesion
                session_destroy();
                break;
        }

    ?>

</body>

</html>