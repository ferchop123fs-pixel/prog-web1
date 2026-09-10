<?php
$conexion = new mysqli("localhost", "biblioter_user", "12345", "testdb");
if ($conexion->connect_error) {
	die("Error de Conexion: " .$conexion->connect_error);
}
echo "Conexion exitosa a la base de datos";
?>
