<?php
include('sesion.php');

$con = mysqli_connect('localhost','root','','bd_recursos');

$sql = "SELECT * FROM tbl_usuario WHERE id_usuario = $login_sesion";

$datos = mysqli_query($con, $sql);

	if (mysqli_num_rows($datos) == 1) {
		$pro = mysqli_fetch_array($datos);
		$nombre_usuario=$pro['usuario'];
	}else{
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>¡Reserva tu recurso!</title>
	<script>
		function avisarBusqueda(){
			if(document.reservar.recursos.value!=""){
				return true;
			} else {
				alert("Debes seleccionar un recurso");
				return false;
			}
		}	
		</script>
</head>
<body>
	<div id="wrapper">
		<nav>
			<?php 
				echo "Bievenido ".$nombre_usuario." | <a href='logout.php'>Log Out</a>";
			 ?>
		</nav>
		<div>
			<p><a href="misarticulos.php">Mis recursos</a></p>
			<p><a href="ver_reservas.php">Ver las reservas</a></p>
		</div>    
		<div>
			<form name="reservar" action="reservar.php" method="POST" onSubmit="return avisarBusqueda();">
		   		<h2 id="tituloReserva">Reservar producto</h2>
		        <select name="recursos">
					<option value="" selected>Selecciona un recurso...</option>
						<?php
						include('login.php');
						$sql = mysqli_query($con, "SELECT * FROM tbl_tipo_recurso");
						while($dato=mysqli_fetch_array($sql)) {
						echo "<option value=\"$dato[id_tipo_recurso]\">$dato[nombre_tipo_recurso]</option>";
						}
						mysqli_close($con);
						?>
				</select>
				<p><input type="submit" value="Buscar"></p>
			</form>
		</div>
	</div>
</body>
</html>