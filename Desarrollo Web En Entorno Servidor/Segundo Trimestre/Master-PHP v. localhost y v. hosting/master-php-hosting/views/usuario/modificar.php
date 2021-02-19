<h1>Modificar Usuario</h1>

<br><h2><?=$_SESSION['error']?></h2>

<form action="<?=base_url?>usuario/modify" method="POST">
	<label for="id">Id</label>
	<input type="number" name="id" value="<?=$id;?>" readonly>
	
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" required value="<?=$nombre?>"/>
	
	<label for="apellidos">Apellidos</label>
	<input type="text" name="apellidos" required value="<?=$apellidos?>"/>
	
	<label for="email">Email</label>
	<input type="email" name="email" required value="<?=$email?>"/>
	
	<label for="password">Contraseña</label>
	<input type="password" name="password" required/>
	
	<input type="submit" value="Modificar" />
</form>