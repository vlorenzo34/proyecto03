<?php

//Inicializamos la sesion
session_start();

//Variable que muestra el error
$error=""; 

//Si no existe la variable enviamos la variable error al html de index
if (isset($_REQUEST['submit'])) {
	if (empty($_REQUEST['username']) || empty($_REQUEST['password'])){
		$error ="<span>Usuario o Contraseña incorrectos</span>";
	}
		else
	{
//Definimos la variable usuario y password
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

//Establecemos conexion con el servidor y la Base de datos
$conexion = mysqli_connect('localhost','root','','bd_recursos');

//Consulta sql para usuario y password
$sql = "SELECT * FROM tbl_usuario WHERE usuario='$username' AND password='$password'";

$datos = mysqli_query($conexion,$sql);

//Comprobamos si existe una linea y creamos la sesion
if (mysqli_num_rows($datos) == 1) {
	$pro = mysqli_fetch_array($datos);
	$idusername=$pro['id_usuario'];

	$_SESSION['login_user'] = $idusername; //Inicializamos la sesion
	header('location:panel.php'); //Llevamos al usuario a su perfil con su sesion
	}else{
		$error ="<span>Usuario o Contraseña incorrectos</span>";
	}
mysqli_close($conexion); //Cerramos la conexion con la Base de datos
}
}
?>