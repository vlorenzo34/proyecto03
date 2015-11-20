<?php 
 include('login.php');
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
 	<div class="wrapper">
 		<div class="container_login">
 			<h1>Bienvenido</h1>
	 		<form class="form" id="form1" action="" method="POST">
	 			<input class="loggin" type="text" name="username" placeholder="User"></p>
	 			<input class="loggin" type="password" name="password" placeholder="Password"></p>
	 			<input class="form2" type="submit" name="submit" value="Acceder"></p>
	 			<span><?php echo "$error"; ?></span>
	 		</form>
	 	</div>
 	</div>
 </body>
 </html>