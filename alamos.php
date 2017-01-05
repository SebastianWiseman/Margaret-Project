<?php 

$conexion = mysql_connect("localhost","root","");

if (!$conexion) {
	die("Eror al conectar con el servidor de bases de datos :( ".mysql_error());
	
}

mysql_select_db("BaseDatosRegistros") or die("no se pudo seleccionar la base de datos :( ".mysql_error());


$nombre = utf8_decode( $_POST['nombre']);
$apellidos = utf8_decode( $_POST['apellidos']);
$telefono = utf8_decode( $_POST['telefono']);
$correo = utf8_decode( $_POST['e-mail']);




$sql="INSERT INTO formulariodatos (idCasa,nombre, apellidos, telefono, correo, fecha)
VALUES 
('Alamos','$nombre','$apellidos','$telefono','$correo',now())";

$result = mysql_query($sql);

mysql_close($conexion);




 ?>
 
 
<!DOCTYPE html>
<html lang="es">
<head>

	<title>Proyecto Margaret - Prueba 1</title>
	
	<meta charset="utf-8"/>
	<meta name="description" content="Proyecto Margaret"/>
	<link rel=stylesheet href="css/normalize.css" type="text/css" />
	<link rel=stylesheet href="css/estilosR.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="fonts.css"/>
	<meta http-equiv="Refresh" content="5; url=alamos.html">


</head>


<body>



			

		
		
		<header >

		<figure id = "baner">
			
		<img src="Imagenes/5.jpg"/>
		
		<figure/>

		
		</header>

		<nav>
			<ul>
				<li><a href="Index.html"><i class="icon icon-home"></i>  Inicio</a></li>	
				<li><a href="catalogo.html">Catalogo de Casas</a></li>
				<li><a href="propuesta.html">Propuesta Personalizada</a></li>
				<li><a href="nosotros.html"><i class="icon icon-newspaper"></i>  Nosotros</a></li>
				
			</ul>
		</nav>

			
			
			
		<section id="Contenido">
			

			<article class="item">
				<h2>Tus datos se han guardado correctamente, uno de nuestros agentes de ventas
					se comunicara contigo lo mas pronto posible
				</h2>
				
			</article>

			

		

			
			

		</section>	

		<footer >
			<p><strong>Copyright © 2015 The Dream Team. All rights reserved.</strong></p>
			<p>Yolo SWAG</p>
		</footer>

</body>


</html>