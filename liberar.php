<?php 
	include('login.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>¡Reserva tu recurso!</title>
	</head>
<body>
	<div id="wrapper">
		<?php
			$con = mysqli_connect('localhost','root','','bd_recursos');

			$id = $_REQUEST['id'];

			$sql = "DELETE FROM tbl_reserva WHERE id_reserva='$id'";
			
			$datos = mysqli_query($con,$sql);

			if(mysqli_affected_rows($con)==1){
				header('Location:misarticulos.php');
			} elseif(mysqli_affected_rows($con)==0){
				echo "No se ha podido liberar la reserva";
			} else {
				echo "Error inesperado";
			}
		?>
			<p><a href="perfil.php">Volver al Perfil</a></p>
	</div>
</body>
</html>