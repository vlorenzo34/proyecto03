<?php
//Conectamos con el servidor y la base de datos
$conexion = mysqli_connect('localhost','root','','bd_recursos');

//Inciamos la sesion
session_start();

//Guardamos la sesion es un variable
$user = $_SESSION['login_user'];

//Creamos la consulta 
$sql = ("SELECT * FROM tbl_usuario WHERE id_usuario ='$user'");

$datos = mysqli_query($conexion,$sql);

$row = mysqli_fetch_assoc($datos);

$login_sesion = $row['id_usuario'];

?>