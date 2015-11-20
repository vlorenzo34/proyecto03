<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Eliminar Usuario</title>
</head>
<body>
	<?php 
	$id = $_REQUEST['id'];
	$con = mysqli_connect('localhost', 'root', '', 'bd_recursos');
	$sql = "DELETE FROM tbl_usuario WHERE id_usuario = $id";
	$datos = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con)==1){
				header('Location:panel_admin.php');
			} elseif(mysqli_affected_rows($con)==0){
				echo "No se ha podido liberar el usuario";
			} else {
				echo "Error inesperado";
	}

	?>
</body>
</html>