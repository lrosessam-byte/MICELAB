<?php
// 1. Conectar a la base de datos
$host = "localhost";
$usuario = "root";
$password = "";
$base_datosP = "PM";

$conexionP = new mysqli($host, $usuario, $password, $base_datosP);
$conexionP->set_charset("utf8");
// Verificar conexión
if ($conexionP->connect_error) {
    die("Error de conexión: " . $conexionI->connect_error);
}

$sqlP = "SELECT * FROM historicoPM";
$resultadoP = $conexionP->query($sqlP);


?>