<!DOCTYPE html>
<html lang="es">

<!--                        +--------------------------------+
                            | EJERCICIO SOBRE POO EN PHP - I |
                            +--------------------------------+

Se desea implementar una clase denominada CuentaBancaria que codifique el funcionamiento 
básico de una cuenta bancaria. Para ello se definen los siguientes atributos y métodos.

Atributos:
    Todos privados
    Métodos de instancia: el saldo de la cuenta y el número de movimientos realizados.
    Métodos de clase (static): número de cuentas bancarias creadas.   

Métodos:
    1)  Tiene un constructor  donde se indica el saldo inicial de la cuenta o sin no se 
        indica nada se inicia la cuenta con saldo igual a 0

    2)  Ingreso, incrementa el saldo en una cantidad indicada como parámetro.

    3)  Abono, decremento el saldo en la cantidad indicada como parámetro.

    4)  Anotar gastos decrementa el saldo en 20 euros si el saldo de la cuenta es menor 1000

    5)  Anotar Intereses incrementa la cuenta según valor de interés indicado como parámetro 
        en tanto por ciento.    

    6)  Realizar transferencia a cuenta, decrementa el saldo en la cantidad indicada como 
        parámetro, realizando un ingreso en la cuenta destino.

    7) Consultar estado de la cuenta, mostrá el saldo actual y el número de operaciones realizadas

Se supone que siempre se pueden hacer la operaciones aunque suponga que la cuenta se queda en 
números rojos. Todos los métodos salvo el consultar saldo incrementa el número de operaciones

                Probar la clase con la siguiente clase de Prueba. (clasePrueba.php)

-->

<head>
    <meta charset="utf-8">
    <title>HTML</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <form action="minibancopro.php" method="POST">
        <fieldset>
            <legend>Operación a realizar</legend>
            Importe: <input name="importe" type="number" focus><br>
            <input type="submit" name="Orden" value="Ingreso">
            <input type="submit" name="Orden" value="Abono">
            <input type="submit" name="Orden" value="Anotar Gastos">
            <input type="submit" name="Orden" value="Anotar Intereses">
            <input type="submit" name="Orden" value="Realizar transferencia">
            <input type="submit" name="Orden" value="Consultar Saldo">
        </fieldset>
    </form>
</body>

</html>