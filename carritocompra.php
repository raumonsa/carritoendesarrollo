<?php
 session_start();

 include './conexion.php';
 if (isset($_SESSION['carrito'])){
 	$arreglo=$_SESSION['carrito'];
 	$busqueda = false;
 	$numero = 0;

 	for ($i=0; $i<count($arreglo);$i++){
 		if ($arreglo[$i]['id']==$_GET['id']){
 			$busqueda = true;
 			$numero = $i;
 		}
 	}

 	if ($busqueda == true){

 		$arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad']+1;
 		$_SESSION['carrito']=$arreglo;
 	}

    }else {
    	if (isset($_GET['id'])){
    		$nombre="";
    		$precio= 0;
    		$imagen="";
    		$re=mysql_query("select * from productos where id =".$_GET['id']);
    		while ($f=mysql_fetch_array($re)){
    			$nombre=$f ['nombre'];
    			$precio=$f ['precio'];
    			$imagen=$f ['imagen'];
    		}
    		$arreglo[]=array('Id'=>$_GET['id'],
    			             'Nombre'=>$nombre,
    			             'Precio'=>$precio,
    			             'Imagen'=>$imagen,
    			             'Cantidad'=>1);
    		$_SESSION['carrito'] = $arreglo;
    		}
    	}
 ?>  

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
		<h1>Carrito de Compras</h1>
		<a href="./carritocompra.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>

	<section>	
		<?php
		         $total=0; 
              if (isset($_SESSION['carrito'])){
              	$datos = $_SESSION ['carrito'];
              	$total=0;
              	for($i=0; $i<count($datos); $i++){
        ?>

              	<div class = "producto">
              		<center>
                      <img src="./productos/<?php echo $datos[$i]['Imagen'];?>"><br>
              		  <span> <?php echo $datos [$i]['Nombre']?> </span><br>
              		  <span>Precio: <?php echo $datos [$i]['Precio']?> </span><br>
              		  <span>Cantidad <input type = "text" value="<?php echo $datos [$i]['Cantidad']?>"></span><br>
                      <span>Precio: <?php echo $datos [$i]['Precio']*$datos [$i]['Cantidad']?></span><br>
                    </center>
                </div>

        <?php 
           $total = ($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;

          }
          }else {
    	      echo '<center><h2>No has añadido ningun producto al total de tu compra</h2></center>';
            }
          echo '<center><h2>Total: '.$total.'</h2></center>';
     ?>

      <center>
      	<a href="./index.php" title="Volver al Catalogo">
			<img src="./imagenes/vacio2.jpg">
			<h3>Ver Catalogo</h3>
		</a>
      </center>

    </section>
		<footer>
        </footer>
</body>
</html>