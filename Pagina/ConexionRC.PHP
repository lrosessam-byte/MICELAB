<?php
// 1. Conectar a la base de datos
$host = "localhost";
$usuario = "root";
$password = "";
$base_datosRC = "recibo";

$conexionRC = new mysqli($host, $usuario, $password, $base_datosRC);
$conexionRC->set_charset("utf8");
// Verificar conexión
if ($conexionRC->connect_error) {
    die("Error de conexión: " . $conexionRC->connect_error);
}
$sqlRC = "SELECT * FROM ingresomp";
$resultadoRC = $conexionRC->query($sqlRC);

?>