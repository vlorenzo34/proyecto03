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
	</head>
<body>
	<div id="wrapper">
	<nav>
		<?php 
			echo "Perfil de: ".$nombre_usuario." | <a href='logout.php'>Log Out</a>";
		?>
	</nav>
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
		}   	
	?>
	</table>
	<?php
		}else{
			echo "No hay recursos reservados.";
		}
		mysqli_close($con);
	?>
		<p><a href="perfil.php">Volver</a></p>
	</div>
</body>
</html>