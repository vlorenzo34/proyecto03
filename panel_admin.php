<?php  
include('sesion.php');
	$con = mysqli_connect('localhost', 'root', '', 'bd_recursos');

	$sql0 = "SELECT * FROM tbl_usuario WHERE id_usuario=$login_sesion";

	$datos0 = mysqli_query($con, $sql0);
	
	if (mysqli_num_rows($datos0) == 1) {
		$pro0 = mysqli_fetch_array($datos0);
		$nombre_usuario=$pro0['usuario'];
	}else{

	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>¡Reserva tu recurso!</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
<body>
	<div class="wrapper">
	<header>
		<p class="username"><?php echo "Bienvenido ".$nombre_usuario." | <a href='logout.php'>Log Out</a>"; ?></p>
	</header>
	<div class="container">
	<?php	
		//Consulta del Recurso
		$sql = "SELECT * FROM tbl_usuario ORDER BY tipo_usuario";
		$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
	?>
		<table border="1">
			<tr>
				<th>id Usuario</th>
				<th>Nombre</th>
				<th>Contraseña</th>
				<th>Tipo usuario</th>
				<th>Modificar Usuario</th>
				<th>Borrar Usuario</th>
			</tr>
	<?php
		while($prod = mysqli_fetch_array($datos)) {
	 	echo "<tr><td>";
      	echo "$prod[id_usuario]";
      	echo "<td>";
      	echo "$prod[usuario]";
      	echo "</td>";
      	echo "<td>";
      	echo "$prod[password]";
		echo "</td>";
		echo "<td>";
      	echo "$prod[tipo_usuario]";
		echo "</td>";
		echo "<td>";
      	echo "<a href='modificar_usuario.php?id=$prod[id_usuario]'><img src='img/modificar.png'></a>";
		echo "</td>";
		echo "<td>";
		echo "<a href='eliminiar_usuario.php?id=$prod[id_usuario]'><img src='img/eliminar.png'></a>";
		echo "</td>";
		}   	
	?>
	</table>
	<br/>
	<a class="a" href="crear_usuario.php">Crear usuario</a>
	<br/>
	<?php
		}else{
			echo "No hay recursos reservados.";
		}
		mysqli_close($con);
	?>
		<p><a class="a" href="perfil.php">Volver</a></p>
		</div>
	</div>
</body>
</html>