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

<div class="top-name">
	DISCO WEB
</div>

<div class="create-user-form-grid">
	<div class="create-user-form">
		<p class="create-user-title"><b>CREAR USUARIO</b></p>
		<div id='aviso'>
			<b><?= (isset($msg))?$msg:"" ?></b>
		</div>
		<form name='ALTA' method="POST" action="index.php?orden=Alta">

			<p class="create-user-text">Identificador</p>
			<input type="text" name="iduser" required>

			<p class="create-user-text">Nombre</p>
			<input type="text" name="nombre" required>

			<p class="create-user-text">Correo Electrónico</p>
			<input type="email" name="email" required>

			<p class="create-user-text">Contraseña</p>
			<input type="password" name="clave1" required>

			<p class="create-user-text">Repetir Contraseña</p>
			<input type="password" name="clave2" required>

			<div class="select-div">
				<div class="select-div-left">
					<p class="create-user-text">Plan</p>
					<select name="plan" required>
						<option value="0">Básico</option>
						<option value="1">Profesional</option>
						<option value="2">Premium</option>
						<option value="3">Máster</option>
					</select>
				</div>

				<div class="select-div-right">
					<p class="create-user-text">Estado</p>
					<select name="estado">
						<option value="A">Activo</option>
						<option value="I">Inactivo</option>
						<option value="B">Bloqueado</option>
					</select>
				</div>

				<input type='button' name="orden" value='Volver' onclick="verUsuarios()" class="create-user-return">
				<input type='submit' value='Crear' class="create-user-create">

			</div>

		</form>

	</div>

	<img src="web/img/hosting.png" alt="Disco Web" class="create-user-image">

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