<!DOCTYPE html>
<html>

<?php

    //Comienza la sesión
    session_start();

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
    <title>MiniBank</title>
</head>

<body>

    <?php
        if (!empty($_GET['msg'])) echo "RESULTADO:". $_GET['msg']."<br>";
    ?>

    <form action="minibancopro.php" method="POST">
        <h1>Minibanco 1.0</h1>
        Operación a realizar</br>
        Importe de la operación: <input name="importe" type="text" focus><br>
        <input type="submit" name="Orden" value="Ingreso">
        <input type="submit" name="Orden" value="Reintegro">
        <input type="submit" name="Orden" value="Ver saldo">
        <input type="submit" name="Orden" value="Terminar">
    </form>

    <!-- Recoge el valor de la orden de submit -->
    <?php @$_SESSION['boton'] = $_POST['Orden']; ?>

</body>

</html>