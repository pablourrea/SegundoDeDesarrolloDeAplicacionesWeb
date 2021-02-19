<h1>Gestionar categorias</h1>

<a href="<?=base_url?>categoria/crear" class="button button-small">
	Crear categoria
</a>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
	<strong class="alert_green">La categoria se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>	
	<strong class="alert_red">La categoria NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table>
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>PRODUCTOS</th>
		<th>UNIDADES</th>
		<th>VALOR TOTAL</th>
		<th> </th>
	</tr>
	<?php while($cat = $categorias->fetch_object()): ?>
		<tr>
			<td><?=$cat->id;?></td>
			<td><?=$cat->nombre;?></td>
			<td><?=$cat->nproductos;?></td>
			<td><?=$cat->unidades;?></td>
			<td><?=$cat->total;?></td>

			<td>
				<a href="<?=base_url?>categoria/modificar&id=<?=$cat->id;?>" class="button button-gestion button-small">Editar</a>
				<a href="<?=base_url?>categoria/borrar&id=<?=$cat->id;?>" class="button button-gestion button-red button-small">Eliminar</a>
			</td>
		</tr>
	<?php endwhile; ?>
</table>
