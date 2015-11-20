<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear usuario</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper">
<div class="container">
<form id="form_crear_usuario" action="crear_usuario_proc.php" method="POST">
	<h2>Usuario: </h2><input class="loggin" type="text" name="id_usuario" size="15" maxlength="20" required>
	<h2>Password: </h2><input class="loggin" type="text" name="pass_usuario" size="15" maxlength="20" required>
	<h2>Tipo: </h2>
	<select class="formul" name="tipo_usuario">
		<option value="0">Usuario</option>
		<option value="1">Admin</option>
	</select>
	<br/>
	<input class="form2" type="submit" value="Crear usuario">
	<br/>
	<a class="a" href="panel_admin.php">Volver</a>
</form>
</div>
</div>
</body>
</html>