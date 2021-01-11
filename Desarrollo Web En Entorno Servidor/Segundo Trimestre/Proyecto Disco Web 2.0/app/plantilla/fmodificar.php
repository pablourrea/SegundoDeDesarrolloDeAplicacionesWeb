<?php
	// Guardo la salida en un buffer(en memoria)
	// No se envia al navegador
	ob_start();
	// FORMULARIO DE ALTA DE USUARIOS
?>

<style>
/* DON´T DELETE OR MOVE */
.button-index{
	display: none;
}
</style>

<div id='aviso'>
	<b><?= (isset($msg))?$msg:"" ?></b>
</div>

<div class="top-name">
	DISCO WEB
</div>

<div class="welcome-user">
	<?php echo "Hola, ".$_SESSION['user']."."; ?>
</div>

<div class="modify-user-form-grid">
	<div class="modify-user-form">
		<p class="modify-user-title">MODIFICAR EL USUARIO <?= $user ?> </p>
		<form name='modificar' method="POST" action="index.php?orden=Modificar">

			<p class="modify-user-text">Identificador</p>
			<input type="text" name="iduser" value="<?= $user ?>" readonly length>

			<p class="modify-user-text">Nombre</p>
			<input type="text" name="nombre" value="<?= $nombre ?>">

			<p class="modify-user-text">Correo Electrónico</p>
			<input type="email" name="email" value="<?= $mail ?>">

			<p class="modify-user-text">Contraseña</p>
			<input type="password" name="clave1" value="<?= $clave ?>">

			<p class="modify-user-text">Repetir Contraseña</p>
			<input type="password" name="clave2" value="<?= $clave ?>">

			<div class="select-div">
				<div class="select-div-left">
					<p class="modify-user-text">Plan</p>
					<select name="plan">
						<option value="0" <?= ($plan==0)?"selected=\"selected\"":""; ?>>Básico</option>
						<option value="1" <?= ($plan==1)?"selected=\"selected\"":""; ?>>Profesional</option>
						<option value="2" <?= ($plan==2)?"selected=\"selected\"":""; ?>>Premium</option>
						<option value="3" <?= ($plan==3)?"selected=\"selected\"":""; ?>>Máster</option>
					</select>
				</div>

				<div class="select-div-right">
					<p class="modify-user-text">Estado</p>
					<select name="estado">
						<option value="A" <?= ($estado=="A")?"selected=\"selected\"":""; ?>>Activo</option>
						<option value="I" <?= ($estado=="I")?"selected=\"selected\"":""; ?>>Inactivo</option>
						<option value="B" <?= ($estado=="B")?"selected=\"selected\"":""; ?>>Bloqueado</option>
					</select>
				</div>

				<input type='button' name="orden" value='Volver' onclick="verUsuarios()" class="modify-user-return">
				<input type='submit' value='Modificar' class="modify-user-modify">

			</div>

		</form>
	</div>
	<img src="web/img/searchdata.png" alt="Disco Web" class="create-user-image">
</div>

<script type="text/javascript">
	// LOCAL FUNCTION, DON´T DELETE OR MOVE

	function verUsuarios() {
    	document.location.href = "?orden=VerUsuarios";
	}

</script>

<?php
	// Vacio el bufer y lo copio a contenido
	// Para que se muestre en div de contenido
	$contenido = ob_get_clean();
	include_once "principal.php";
?>