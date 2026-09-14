<?php
// 1. Conectar a la base de datos
$host = "localhost";
$usuario = "root";
$password = "";
$base_datosI = "Inventariomp";

$conexionI = new mysqli($host, $usuario, $password, $base_datosI);
$conexionI->set_charset("utf8");
// Verificar conexión
if ($conexionI->connect_error) {
    die("Error de conexión: " . $conexionI->connect_error);
}
$sqlI = "SELECT * FROM Inventario";
$resultadoI = $conexionI->query($sqlI);

?>