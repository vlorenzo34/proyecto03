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
		$sql = "SELECT * FROM tbl_reserva, tbl_recurso WHERE tbl_reserva.id_recurso=tbl_recurso.id_recurso AND tbl_reserva.id_usuario = $_SESSION[login_user]";
		$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
	?>
		<table>
			<tr>
				<th>Fecha Reserva</th>
				<th>Nombre Recurso</th>
				<th>Hora Inicio</th>
				<th>Hora Final</th>
				<th>Cancelar reserva</th>
			</tr>
	<?php
		while($prod = mysqli_fetch_array($datos)) {
      	echo "<tr><td>";
      	echo "$prod[fecha_reserva]";
      	echo "</td>";
      	echo "<td>";
      	echo "$prod[nombre_recurso]";
 		echo "</td>";
      	echo "<td>";
      	echo "$prod[hora_inicio]";
		echo "</td>";
		echo "<td>";
      	echo "$prod[hora_final]";
		echo "</td>";
		echo "<td>";
		echo "<a href='liberar.php?id=$prod[id_reserva]'><img src='img/eliminar.png'></a>";
		echo "</td></tr>";

		}   	
	?>
	</table>
	<?php
		}else{
			echo "No hay recursos reservados.";
			echo "<br/><br/><br/>";
		}
		mysqli_close($con);
	?>
		<a class="a" href="perfil.php">Volver</a>
		</div>
	</div>
</body>
</html>