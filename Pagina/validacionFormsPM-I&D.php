<?php

$host = "localhost";
$usuario = "root";
$password = "";
$base_datosI = "I&D";

$conexionI = new mysqli($host, $usuario, $password, $base_datosI);
$conexionI->set_charset("utf8");
// Verificar conexión
if ($conexionI->connect_error) {
    die("Error de conexión: " . $conexionI->connect_error);
}
if (isset($_SESSION['count'])) {

  if($_SESSION['count']==1){
    $Nombretabla=$_SESSION["tablaName"];
    $sqlI1 = "SELECT * FROM `$Nombretabla` WHERE 1";
    $resultadoI1 = $conexionI->query($sqlI1);
}else{

     $Nombretabla=$_SESSION["tablaName"];

 $newform1="CREATE TABLE `$Nombretabla` (ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL  , IDC VARCHAR(30) NULL , Compuesto VARCHAR(30) NULL , Funcion VARCHAR(30) NULL , Porcentaje FLOAT(10) NULL )";
 $resultadonew = $conexionI->query($newform1);

  $sqlI1 = "SELECT * FROM `$Nombretabla` WHERE 1";
  $resultadoI1 = $conexionI->query($sqlI1);

}
}else{
  echo 'NO EXISTE COUNT';
  echo "alho salio mal en la creacion o consulta";
  $sqlI1 = "SELECT * FROM `p-dta-001`WHERE 1";
  $resultadoI1 = $conexionI->query($sqlI1);
}


?>