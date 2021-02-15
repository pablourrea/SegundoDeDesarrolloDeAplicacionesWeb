<?php
include_once 'AccesoDatos.php';
include_once 'Producto.php';

$conexdb = AccesoDatos::initModelo();
$tproductos = $conexdb->obtener_productos();
if (isset($_POST['producto'])) {
    $producto = $_POST['producto'];
    
    if(!isset($_COOKIE['ultimo_acceso'])) {
        // Caduca en un año
        setcookie('ultimo_acceso',time(), time() + 24*60*60); //24*60*60
        $conexdb->actualizar_productos($producto);
        $tproductos = $conexdb->obtener_productos();
        
    } else{
        $mensaje="Deben pasar 24h para poder realizar esta operacion";
    }

}   
?>

<!DOCTYPE html>
<html lang="es">

	<head>
    	<meta charset="utf-8">
    	<title>Consulta Productos</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

<body>
	<?= isset($mensaje)?$mensaje:"" ?>

	<div id="container" style="width: 380px;">
		<div id="header">
			<h1>BAJAR PRECIOS</h1>
		</div>

		<div id="content">
			<form method="POST" id="my_form" action="consulta.php">
				<table border=1>
					<tr>
						<th></th>
						<th>no</th>
						<th>Descripción del producto</th>
						<th>stock</th>
						<th>precio</th>
					</tr>

    				<?php foreach ($tproductos as $producto ) { ?>

        			<tr>
						<td><input type="checkbox" name="producto[]" value="<?=$producto->PRODUCTO_NO ?>" form="my_form"></td>
						<td><?=$producto->PRODUCTO_NO ?></td>
						<td><?=$producto->DESCRIPCION  ?></td>
						<td><?=$producto->STOCK_DISPONIBLE ?></td>
						<td><?=$producto->PRECIO_ACTUAL ?></td>
					</tr>

   	 	 			<?php } ?>

   	 			</table>

				<input type="submit" name="actualizar" value="Actualizar" form="my_form">

			</form>

		</div>
	</div>

</body>
</html>