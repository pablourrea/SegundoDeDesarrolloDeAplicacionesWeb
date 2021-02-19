<table>
	<tr>
		<th>ID</th>
		<th>e-MAIL</th>
		<th>NOMBRE COMPLETO</th>
		<th> </th>
	</tr>
	<?php 
		while ($us = $usuarios->fetch_object()):
	?>
		<tr>
			<td><?=$us->id;?></td>
    	    <td><?=$us->email;?></td>
			<td><?=$us->nombre." ".$us->apellidos;?></td>
			<td>
				<a href="<?=base_url?>usuario/verinfo&id=<?=$us->id?>" class="button button-gestion">+ Info</a>
				<a href="<?=base_url?>usuario/modificar&id=<?=$us->id?>&nombre=<?=$us->nombre?>&apellidos=<?=$us->apellidos?>&email=<?=$us->email?>" class="button button-gestion">Editar</a>
				<a href="<?=base_url?>usuario/eliminar&id=<?=$us->id?>" class="button button-gestion button-red">Eliminar</a>
			</td>
		</tr>
	<?php endwhile; ?>
</table>