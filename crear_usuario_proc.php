<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Eliminar Usuario</title>
</head>
<body>
	<?php 

	$user_name = $_REQUEST['id_usuario'];
	$user_pass = $_REQUEST['pass_usuario'];
	$user_tipe = $_REQUEST['tipo_usuario'];

	$con = mysqli_connect('localhost', 'root', '', 'bd_recursos');
	$sql = "INSERT INTO `tbl_usuario`(`password`, `usuario`, `tipo_usuario`) VALUES ('$user_pass','$user_name','$user_tipe')";
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