<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>

<body>
	<header>
		<h1>Información Producto</h1>
		<a href="./carritocompra.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>

	<section>
		
	<?php
		include 'conexion.php';
		$re=mysql_query("select * from productos where id=".$_GET['id'])or die(mysql_error());
		while ($f=mysql_fetch_array($re)) {
		?>
			<div class="producto">
			<center>
				<img src="./productos/<?php echo $f['imagen'];?>"><br>
				<span><?php echo $f['nombre'];?></span><br>
				<span><?php echo $f['precio'];?></span><br>
				<span><?php echo $f['descripcion'];?></span><br>
				<a href="./carritocompra.php?id=<?php echo $f['id'];?>">Añadir al Carrito</a>
			</center>
		</div>
	<?php
		}
	?>
		</section>
		<footer>
        </footer>
</body>
</html>