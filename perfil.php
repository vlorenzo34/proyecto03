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
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper">
		<header>
			<p class="username"><?php echo "Bienvenido ".$nombre_usuario." | <a href='logout.php'>Log Out</a>"; ?></p>
		</header>
		<div class="container">
			<form name="reservar" action="reservar.php" method="POST" onSubmit="return avisarBusqueda();">
		   		<h1 id="tituloReserva">Reservar recurso</h1>
		        <select class="formul" name="recursos">
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
				<input class="form2" type="submit" value="Buscar">
			</form>
			<?php
				$con = mysqli_connect('localhost','root','','bd_recursos');

				$sql1 = "SELECT * FROM tbl_usuario WHERE id_usuario = $login_sesion";

				$datos1 = mysqli_query($con, $sql1);

				while ($array = mysqli_fetch_array($datos1)) {
					if ($array['tipo_usuario'] == 1){
						echo "<p><a class='a'href='misarticulos.php'>Mis recursos</a></p>";
						echo "<p><a class='a' href='ver_reservas.php'>Panel de administración de reservas</a></p>";
						echo "<p><a class='a' href='panel_admin.php'>Panel de administrador de usuarios</a></p>";
						echo "<p><a class='a' href='#'>Panel de administrador de recursos (No funciona)</a></p>";
					}else{
						echo "<p><a class='a' href='ver_reservas.php'>Ver las reservas</a></p>";
						echo "<p><a class='a' href='misarticulos.php'>Mis recursos</a></p>";
					}
				}
			?>
		</div>
	</div>
</body>
</html>