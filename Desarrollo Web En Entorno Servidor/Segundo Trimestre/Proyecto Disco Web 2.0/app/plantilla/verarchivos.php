<?php
// Guardo la salida en un buffer(en memoria). No se envia al navegador
ob_start();
?>

<!-- Ver ficheros -->
<style>
/* DON´T DELETE OR MOVE */
.button-index{
	display: none;
}

center{
	display: none;
}

.archive-div {
    margin: 0 auto;
	width: 90%;
	min-height: 800px;
    background-color: #acacac;
    border-style: dashed;
}
</style>

<div id='aviso'><b><?= (isset($msg))?$msg:"" ?></b></div>

<div class="top-name">
	DISCO WEB
</div>

<div class="welcome-user">
	<?php echo "Hola, ".$_SESSION['user']."."; ?>
</div>

<div class="self-control-buttons">
	<form action='index.php'>
		<input type='button' class="button-class" value='Cerrar Sesión' id="logout-button" onclick="cerrarSesionUsuario()">
		<input type='button' class="button-class" value='Archivos' id="user-control-button">
		<input type='button' class="button-class" value='Modificar Datos' id="archives-button" onclick="modificarDatos()">
	</form>
</div>

<div class="user-control-panel-admin-welcome">
	FICHEROS
</div>

<div class="archive-div">
	<p style="width:: 100%; margin-top: 50px; text-align: center; font-size: 30px; font-weight: bolder;">AQUI VAN LOS FICHEROS EN GRID<p>
</div>

<script type="text/javascript">
function cerrarSesionUsuario() {
	document.location.href = "index.php?operacion=Cerrar";
}

function subirFicheros() {
	document.location.href = "?operacion=Nuevo";
}

function verFicheros() {
	document.location.href = "?operacion=VerFicheros";
}

function modificarDatos() {
	document.location.href = "?operacion=Modificar";
}
</script>

<?php
  // Vacio el buffer y lo copio a contenido para que se muestre en el cuadro de contenido
  $contenido = ob_get_clean();
  include_once "principal.php";
?>
