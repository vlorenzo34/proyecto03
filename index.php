<?php 
 include('login.php');

 	//Miramos si la variable Sesion existe y enviamos a la pagina perfil
	if(isset($_SESSION['login_user'])){
	 	header('location:perfil.php');
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
 	<div id="wrapper">
 		<h2>Panel de Control</h2>
 		<form id="form1" action="" method="POST">
 			<p>Usuario</p>
 			<p><input type="text" name="username" placeholder="admin"></p>
 			<p>Password</p>
 			<p><input type="password" name="password" placeholder="**********"></p>
 				<!-- Variable error -->
 			<p><span><?php echo "$error"; ?></span></p>
 			<p><input type="submit" name="submit" value="Acceder"></p>
 		</form>
 	</div>
 </body>
 </html>