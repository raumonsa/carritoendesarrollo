

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
        <h1>Compra en Línea</h1>
		<a href="./carritocompra.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>

	<section>
		
	<?php
		include 'conexion.php';
		$re=mysql_query("select * from productos")or die(mysql_error());
		while ($f=mysql_fetch_array($re)) {
		?>
			<div class="producto">
			<center>
				<img src="./productos/<?php echo $f['imagen'];?>"><br>
				<span><?php echo $f['nombre'];?></span><br>
				<a href="./detalles.php?id=<?php echo $f['id'];?>">Detalle Producto</a>
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