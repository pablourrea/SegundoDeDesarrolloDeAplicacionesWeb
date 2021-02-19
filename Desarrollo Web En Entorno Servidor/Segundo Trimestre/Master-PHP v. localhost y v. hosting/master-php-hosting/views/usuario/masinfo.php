<table>
	<tr>
		<th style="padding-top:30px;">ID</th>
	</tr>

	<tr>
		<td style="padding-top:15px;"><?php echo $id ?></td>
    </tr>

    <tr>
		<th style="padding-top:40px;">PEDIDOS PENDIENTES</th>
	</tr>

    <?php while ($us2 = $usuarios2->fetch_object()): ?>
    <tr>
		<td style="padding-top:15px;"><?=$us2->pendientesentrega;?></td>
    </tr>
    <?php endwhile; ?>

    <tr>
		<th style="padding-top:40px;">TOTAL GASTADO</th>
	</tr>

    <?php while ($us3 = $usuarios3->fetch_object()): ?>
    <tr>
		<td style="padding-top:15px;"><?=$us3->totalgastado;?></td>
    </tr>
    <?php endwhile; ?>

</table>