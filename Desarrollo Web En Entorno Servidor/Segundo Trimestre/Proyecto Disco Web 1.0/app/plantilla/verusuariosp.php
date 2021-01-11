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

<div class="welcome-user">
	<?php echo "Hola, ".$_SESSION['user']."."; ?>
</div>

<div class="self-control-buttons">
	<form action='index.php'>
		<input type='hidden' name='orden' value='Cerrar'> <input type='submit' class="button-class" value='Cerrar Sesión' id="logout-button">
		<input type='button' class="button-class" value='Control de Usuarios' id="user-control-button">
		<input type='button' class="button-class" value='Archivos' onclick="firstVersion()" id="archives-button">
	</form>
</div>

<div class="user-control-panel-admin-welcome">
	PANEL DE CONTROL DE USUARIOS
</div>

<div class="user-control-panel">

	<table>

		<tr>
			<td colspan="8" class="button-class-register-new-user-zone">
				<input type='button' class="button-class-register-new-user" value='Nuevo Usuario' onclick="altaUsuario()">
			</td>
		</tr>

		<tr>
			<?php
				$auto = $_SERVER['PHP_SELF'];
				// identificador => Nombre, email, plan y Estado
			?>
			<td id="index-table-control-user">
				USUARIO
			</td>
			<td id="index-table-control-user">
				NOMBRE
			</td> 
			<td id="index-table-control-user">
				CORREO ELECTRONICO
			</td> 
			<td id="index-table-control-user">
				NIVEL
			</td> 
			<td id="index-table-control-user">
				ESTADO
			</td> 
			<td colspan="3" id="index-table-control-user">
				ACCIONES
			</td> 

		</tr>

			<?php foreach ($usuarios as $clave => $datosusuario) : ?>

		<tr>		
			<td>
				<?= $clave ?>
			</td> 

			<?php for  ($j=0; $j < count($datosusuario); $j++) :?>

	     	<td>
				<?=$datosusuario[$j] ?>
			</td>

			<?php endfor;?>

			<td id="control-user-buttons">
				<a href="#" onclick="confirmarBorrar('<?= $datosusuario[0]."','".$clave."'"?>);">Borrar</a>
			</td>

			<td id="control-user-buttons">
				<a href="<?= $auto?>?orden=Modificar&id=<?= $clave ?>">Modificar</a>
			</td>

			<td id="control-user-buttons">
				<a href="<?= $auto?>?orden=Detalles&id=<?= $clave?>">Detalles</a>
			</td>

		</tr>

		<?php endforeach; ?>

	</table>

</div>

<script type="text/javascript">
	// LOCAL FUNCTIONS, DON´T DELETE OR MOVE
	
    function volverInicio() {
        document.location.href = "index.php?orden=Inicio";
	}

	function altaUsuario() {
    	document.location.href = "?orden=Alta";
	}

	function firstVersion() {
    	alert("Primera versión de la página, esta función aún no está disponble");
	}

</script>

<?php
	// Vacio el bufer y lo copio a contenido
	// Para que se muestre en div de contenido de la página principal
	$contenido = ob_get_clean();
	include_once "principal.php";
?>