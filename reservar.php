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
<html lang="en">
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
			$sql = "SELECT * FROM tbl_tipo_recurso  INNER JOIN tbl_recurso ON tbl_tipo_recurso.id_tipo_recurso=tbl_recurso.id_tipo_recurso WHERE tbl_tipo_recurso.id_tipo_recurso=$_REQUEST[recursos] AND tbl_recurso.id_tipo_recurso=$_REQUEST[recursos]";
			$datos = mysqli_query($con, $sql);
				if(mysqli_num_rows($datos)>0){
		?>			
			<table border>
				<tr>
					<th>Nombre</th>
					<th>Recurso</th>
					<th>Fecha</th>
					<th>Hora Inicio</th>
					<th>Hora Final</th>
					<th>Reservar</th>
				</tr>
		<?php
		while ($prod = mysqli_fetch_array($datos)){
			echo "<tr><td>";
			echo "<form action='confirmarreserva.php' method='GET'>";
			echo "$prod[nombre_recurso]";
				$fichero="img/$prod[foto_recurso]";
				if(file_exists($fichero)){
				echo "</td><td></p><img src='$fichero'>";
				}
			echo "<td><input type='date' name='fecha'></td>";
			echo "<td><select name='hora_inicio'>
				 <option value='08:00'>08:00</option>
				 <option value='09:00'>09:00</option>
				 <option value='10:00'>10:00</option>
				 <option value='11:00'>11:00</option>
				 <option value='12:00'>12:00</option>
				 <option value='16:00'>16:00</option>
				 <option value='17:00'>17:00</option>
				 <option value='18:00'>18:00</option>
				 <option value='19:00'>19:00</option>
				 <option value='20:00'>20:00</option></td>";

			echo "<td><select name='hora_final'>
				 <option value='08:55'>08:55</option>
				 <option value='09:55'>09:55</option>
				 <option value='10:55'>10:55</option>
				 <option value='11:55'>11:55</option>
				 <option value='12:55'>12:55</option>
				 <option value='16:55'>16:55</option>
				 <option value='17:55'>17:55</option>
				 <option value='18:55'>18:55</option>
				 <option value='19:55'>20:55</option>
				 <option value='20:55'>20:55</option></td>";

			echo "<td>
					<input type='submit' value='Reservar'>
					<input type='hidden' name='id' value='$prod[id_recurso]'>
					</form></td></tr>";
		}
		?>	
		<?php
			} else {
				echo "Productos no encontrados!";
			}
			mysqli_close($con);
		?>
		</form>
		</table>
		<p><a class="a" href="perfil.php">Volver a mi perfil</a></p>
		</div>
	</div>
	</body>
</html>