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
		<p class="create-user-title">CREA TU CUENTA <b>GRATIS</b></p>
		<div id='aviso'>
			<b><?= (isset($msg))?$msg:"" ?></b>
		</div>
		<form name='ALTA' method="POST" action="index.php?orden=AltaUser">

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
					<select name="plan" class="user-select-create-account-plan" onchange="priceText();" required>
						<option value="0">Básico</option>
						<option value="1">Profesional</option>
						<option value="2">Premium</option>
					</select>
				</div>

				<div class="select-div-right">
					<div class="create-user-text">
						<p class="create-user-price-class">Precio: GRATIS</p>
					</div>
				</div>

				<input type='button' name="orden" value='Volver' onclick="volverInicio()" class="create-user-return" id="create-user-return">
				<input type='submit' value='Crear Cuenta' onclick="altaUsuario()" class="create-user-create">

			</div>

		</form>

	</div>

	<img src="web/img/hosting.png" alt="Disco Web" class="create-user-image">

</div>

<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>

<script type="text/javascript">
	// LOCAL FUNCTIONS, DON´T DELETE OR MOVE

	const selectElement = document.querySelector('.user-select-create-account-plan');

	selectElement.addEventListener('change', (event) => {
		const resultado = document.querySelector('.create-user-price-class');
		
		switch (event.target.value) { 
			case '0': 
				resultado.textContent = `Precio: GRATIS`;
				break;
			case '1': 
				resultado.textContent = `Precio: 9.99€/mes`;
				break;
			case '2': 
				resultado.textContent = `Precio: 19.99€/mes`;
				break;
		}
	});

	function volverInicio() {
        document.location.href = "index.php?orden=Inicio";
	}
</script>

<?php
	// Vacio el bufer y lo copio a contenido
	// Para que se muestre en div de contenido
	$contenido = ob_get_clean();
	include_once "principal.php";
?>