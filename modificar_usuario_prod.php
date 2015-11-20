<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar usuario</title>
</head>
<body>
	<?php 

	$id = $_REQUEST['id_usuario'];
	$user_name = $_REQUEST['nombre_usuario'];
	$user_pass = $_REQUEST['pass_usuario'];
	$user_tipe = $_REQUEST['tipo_usuario'];

	$con = mysqli_connect('localhost', 'root', '', 'bd_recursos');
	$sql = "UPDATE `tbl_usuario` SET `password`='$user_pass', `usuario`='$user_name', `tipo_usuario`='$user_tipe' WHERE id_usuario = '$id' ";
	$datos = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con)==1){
				header('Location:panel_admin.php');
			} elseif(mysqli_affected_rows($con)==0){
				echo "No se ha podido añadir el usuario";
			} else {
				echo "Error inesperado";
	}

	?>
</body>
</html>