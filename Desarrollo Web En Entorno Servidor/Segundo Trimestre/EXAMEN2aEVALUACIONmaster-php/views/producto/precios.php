<h1>Gestionar precios</h1>

<?php if(isset($_SESSION['productosActualizados']) && $_SESSION['productosActualizados'] >= 1): ?>
    <strong class="alert_green">Se han actualizado <?php $_SESSION['productosActualizados'] ?> productos.</strong>
<?php endif; ?>

<form action="<?=base_url?>producto/actualizarPrecio" method="POST">
    <table>
    	<tr>
            <th></th>
    		<th>ID</th>
    		<th>NOMBRE</th>
    	</tr>

    	<?php while($cat = $categorias->fetch_object()): ?>
    		<tr>
                <td><input type="checkbox" name="tcategorias[]" value="<?=$cat->id;?>"></td>
    			<td><?=$cat->id;?></td>
    			<td><?=$cat->nombre;?></td>
    		</tr>
    	<?php endwhile; ?>
    </table>
    
    <br>

    <h3>
        Porcentaje: <br>
        <input value="0" type="number" name="porcentaje" min="0" max="50">
        % <br>
        <input type="radio" value="suma" name="oper" checked="">
        &nbsp; Incrementar<br>
        <input type="radio" value="resta" name="oper">
        &nbsp; Rebajar <br>
    </h3>

    <input type="submit" value=" Cambiar Precios ">
    
</form>
