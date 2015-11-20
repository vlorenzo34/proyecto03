<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear usuario</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
	$con = mysqli_connect('localhost', 'root', '', 'bd_recursos');
	$sql = "SELECT * FROM tbl_usuario WHERE id_usuario=$_REQUEST[id]";
	$datos = mysqli_query($con, $sql);
	if(mysqli_num_rows($datos)>0){
	$prod=mysqli_fetch_array($datos);
?>
<div class="wrapper">
<div class="container">
<form id="modificar_usuario" action="modificar_usuario_prod.php" method="POST">
    <input type="hidden" name="id_usuario" value="<?php echo $prod['id_usuario']; ?>">
	<h2>Usuario: </h2><input class="loggin" type="text" name="nombre_usuario" value="<?php echo $prod['usuario'] ?>" size="15" maxlength="20" required>
	<br/>
	<h2>Password: </h2><input class="loggin" type="text" name="pass_usuario" value="<?php echo $prod['password'] ?>" size="15" maxlength="20" required>
	<br/>
	<br/>
	<select class="formul" name="tipo_usuario">
		<?php
			if ($prod['tipo_usuario']==1) {
				echo "<option value='0'>Usuario</option>";
				echo "<option value='1' selected>Admin</option>";
			} else {
				echo "<option value='0' selected>Usuario</option>";
				echo "<option value='1'>Admin</option>";
			}

		?>
	</select>
	<br/>
	<input class="form2" type="submit" value="Guardar">
	<br/>
	<a class="a" href="panel_admin.php">Volver</a>
</form>
<?php 
} ?>
</div>
</div>
</body>
</html>