<table>
	<tr>
		<th>ID</th>
		<th>e-MAIL</th>
		<th>NOMBRE COMPLETO</th>
	</tr>
	<?php while ($us = $usuario->fetch_object()): ?>
		<tr>
			<td><?=$us->id;?></td>
            <td><?=$us->email;?></td>
			<td><?=$us->nombre; $us->apellidos;?></td>
			<td>
				<!-- <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
				<a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a> -->
			</td>
		</tr>
	<?php endwhile; ?>
</table>