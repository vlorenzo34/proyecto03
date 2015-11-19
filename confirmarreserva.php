<?php
include('login.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>¡Reserva tu recurso!</title>
</head>
	<body>
		<div id="wrapper">
		<?php
			$con = mysqli_connect('localhost','root','','bd_recursos');

			$fecha = $_REQUEST['fecha'];
			$hora_inicio = $_REQUEST['hora_inicio'];
			$hora_final = $_REQUEST['hora_final'];
			$recurso = $_REQUEST['id'];
			
			$sql1 = "SELECT * FROM `tbl_reserva` WHERE id_recurso = $recurso AND `fecha_reserva` = '$fecha' AND hora_inicio < '$hora_inicio' AND hora_final > '$hora_final';";

			$datos = mysqli_query($con,$sql1);

			if(mysqli_num_rows($datos)>0) {

			echo "No se puede reservar en esa franja horaria";
			echo "<a href='perfil.php'>Volver al perfil</a>";

			}else{

			$sql = "INSERT INTO tbl_reserva (id_usuario, id_recurso, fecha_reserva, hora_inicio, hora_final) VALUES ('$_SESSION[login_user]', '$_REQUEST[id]', '$fecha', '$hora_inicio', '$hora_final')";
			
				header('Location:misarticulos.php');
				$datos = mysqli_query($con,$sql);

			}

			mysqli_close($con);

		?>
		</div>
	</body>
</html>