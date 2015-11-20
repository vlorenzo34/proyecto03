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
		<p class="username"><?php echo "Bievenido ".$nombre_usuario." | <a href='logout.php'>Log Out</a>"; ?></p>
	</header>
	<div class="container">
	<?php	
		//Consulta del Recurso
		$sql = "SELECT * FROM tbl_reserva, tbl_usuario WHERE tbl_reserva.id_usuario = tbl_usuario.id_usuario ORDER BY tbl_reserva.id_usuario";
		$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
	?>
		<table border="1">
			<tr>
				<th>id_Reserva</th>
				<th>Fecha Reserva</th>
				<th>Hora Inicio</th>
				<th>Hora Final</th>
				<th>Usuario</th>
				<th>id_Recurso</th>
				<?php 
				$con = mysqli_connect('localhost', 'root', '', 'bd_recursos');
				$sql1 = "SELECT * FROM tbl_usuario WHERE id_usuario=$login_sesion";
				$datos2 = mysqli_query($con, $sql1);

				while ($prod = mysqli_fetch_array($datos2)) {
					if ($prod['tipo_usuario'] == 1) {
						echo "<th>Borrar recurso</th>";
					}
				}
				?>
			</tr>
	<?php
		while($prod = mysqli_fetch_array($datos)) {
	 	echo "<tr><td>";
      	echo "$prod[id_reserva]";
      	echo "<td>";
      	echo "$prod[fecha_reserva]";
      	echo "</td>";
      	echo "<td>";
      	echo "$prod[hora_inicio]";
		echo "</td>";
		echo "<td>";
      	echo "$prod[hora_final]";
		echo "</td>";
		echo "<td>";
		echo "$prod[usuario]";
		echo "</td>";
		echo "<td>";
		echo "$prod[id_recurso]";
		echo "</td></tr>";

		$sql3 = "SELECT * FROM tbl_reserva, tbl_recurso, tbl_usuario WHERE tbl_reserva.id_recurso=tbl_recurso.id_recurso AND tbl_reserva.id_usuario=$login_sesion";
		$datos3 = mysqli_query($con, $sql3);
		while ($prod = mysqli_fetch_array($datos3)) {
					if ($prod['tipo_usuario'] == 1) {
						echo "<td><a href='eliminar.php?id=$prod[id_reserva]'>Eliminar</a></td></tr>";
					}
				}
		}   	
	?>
	</table>
	<?php
		}else{
			echo "No hay recursos reservados.";
		}
		mysqli_close($con);
	?>	
		<br/><br/>
		<a class="a" href="perfil.php">Volver</a>
		</div>
	</div>
</body>
</html>