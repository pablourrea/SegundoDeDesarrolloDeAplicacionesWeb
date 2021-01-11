<?php
    // Guardo la salida en un buffer(en memoria)
    // No se envia al navegador
    ob_start();
?>

<style>
/* DON´T DELETE OR MOVE */
.button-index{
	display: none;
}
</style>

<div class="top-name">
	DISCO WEB
</div>

<center class="user-details-structure">
    <?php
        $auto = $_SERVER['PHP_SELF'];
        //identificador => Nombre, email, plan y Estado
        foreach ($usuarios as $clave => $datosusuario) {
            // clave-->usuario $datosusuario--> array con datos del usuario
    ?>

    <?php
        echo "<h1 class=\"user-details-title\">Detalles de ", $clave, "</h1>";
        for ($j = 0; $j < count($datosusuario); $j ++) {
            switch ($j) {
                case 0:
                    echo "<p class=\"user-details-text\"><b>Nombre: </b>", $datosusuario[$j], "</p>";
                    break;
                case 1:
                    echo "<p class=\"user-details-text\"><b>Email: </b>", $datosusuario[$j], "</p>";
                    break;
                
                case 2:
                    echo "<p class=\"user-details-text\"><b>Plan: </b>", $datosusuario[$j], "</p>";
                    break;
                
                case 3:
                    echo "<p class=\"user-details-text\"><b>Estado: </b>", $datosusuario[$j], "</p>";
                    break;
                
                case 4:
                    //Estático en versión 1, pendiente de modificar
                    echo "<p class=\"user-details-text\"><b>Numero de ficheros: </b>", $datosusuario[$j], "</p>";
                    break;
                
                case 5:
                    //Estático en versión 1, pendiente de modificar
                    echo "<p class=\"user-details-text\"><b>Espacio ocupado: </b>", $datosusuario[$j], "</p>";
                    break;
            }
        }
    ?>

    <?php
        }
    ?>

    <br>
    <form action='index.php'>
        <input type='hidden' name='orden' value='VerUsuarios'>
        <input type='submit' value='Volver' class="button-user-details">
    </form>

</center>


<?php
    // Vacio el bufer y lo copio a contenido
    // Para que se muestre en div de contenido de la página principal
    $contenido = ob_get_clean();
    include_once "principal.php";
?>