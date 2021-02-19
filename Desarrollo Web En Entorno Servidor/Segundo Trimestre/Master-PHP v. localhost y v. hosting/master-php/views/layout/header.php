<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Tienda de Camisetas</title>
		<link rel="stylesheet" href="<?=base_url?>assets/css/styles.css" />
		<link rel="icon" href="<?=base_url?>assets/img/camiseta.png">
		<!-- <link rel="stylesheet" href="../../assets/css/styles.css" /> -->
	</head>
	<body>
		<div id="container">
			<!-- CABECERA -->
			<header id="header">
				<div id="logo">
					<img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta Logo" />
					<a href="<?=base_url?>">
						Tienda de camisetas
					</a>
				</div>
			</header>

			<!-- MENU -->
			<?php $categorias = Utils::showCategorias(); ?>
			<nav id="menu" role="full-horizontal">
				<ul>
					<li>
						<a href="<?=base_url?>">Inicio</a>
					</li>
					<?php while($cat = $categorias->fetch_object()): ?>
						<li>
							<a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
						</li>
					<?php endwhile; ?>
					<li>
						<a href="<?=base_url?>producto/ofertas">
						<img style="height:40px; margin bottom:0px; float: right;" src="<?=base_url?>assets/img/ofertas.png"></a>
					</li>
				</ul>
			</nav>

			<div id="content">