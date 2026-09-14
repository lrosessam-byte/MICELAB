<?php
// 1. Conectar a la base de datos
$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "ADMIN";

$conexion = new mysqli($host, $usuario, $password, $base_datos);
$conexion->set_charset("utf8");
// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


?>