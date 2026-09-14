<?php
include ("ConexionI&D.php");

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
if (isset($_SESSION['countPM'])) {


  if($_SESSION['countPM']==1){
    
    $tlote=$_SESSION["lotePM"];
  $ExistLot="SELECT count(*) AS total FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'PM') AND (TABLE_NAME ='$tlote')";
  
$resultadoExistLot = $conexionP->query($ExistLot);
if ($resultadoExistLot) {
    $filaelot = $resultadoExistLot->fetch_assoc();
    $cantidadelot  = $filaelot['total']; // Aquí tienes el número en la variable

if (isset($cantidadelot)) {

  if($cantidadelot==1){
     $CProduct=$_SESSION['CP'];
        $sqlI2 = "SELECT Porcentaje, Funcion, Compuesto, ID , Costo FROM `$CProduct` WHERE 1";
         $resultadoI2 = $conexionI->query($sqlI2);

$query ="SELECT COUNT(*) AS totalf FROM `$CProduct`";

$Resultquery = $conexionI->query($query);
$query1 ="SELECT COUNT(*) AS totalff FROM `$tlote`";

$Resultquery1 = $conexionP->query($query1);
if ($Resultquery and $Resultquery1) {

    $filanum = $Resultquery->fetch_assoc();
    $cantidadefnum  = $filanum['totalf']; 
   
    ECHO $cantidadefnum;
    $filanum1= $Resultquery1->fetch_assoc();
    $cantidadefnum1  = $filanum1['totalff']; 
   
    ECHO $cantidadefnum1;

    
    }
$consultadeCantidadP="SELECT Cantidad FROM historicopm WHERE Lote='$tlote'";
$resultCCantP=$conexionP->query($consultadeCantidadP);

    if ($resultadoI2->num_rows> 0) {
  while($fila2 = $resultadoI2->fetch_assoc()) {
    
 if ($resultCCantP->num_rows> 0) {
  while($fila3 = $resultCCantP->fetch_assoc()) {

    $cantidadAP=$fila3["Cantidad"];
  }}
    $PorcentC=$fila2["Porcentaje"];
    $FuncionC=$fila2["Funcion"];
    $NombreC=$fila2["Compuesto"];
     $IDCompsf=$fila2["ID"];
     $CantidadFc= $fila2["Porcentaje"]*$cantidadAP/100;
     $ccostoFC=$fila2["Costo"]*$cantidadAP/100;
 $UpdateForm="UPDATE `$tlote` SET Compuesto= '$NombreC', Funcion='$FuncionC', Porcentaje= $PorcentC , Cantidad= $CantidadFc, Costo=$ccostoFC WHERE ID= $IDCompsf";

     $resultadoUpdateForm = $conexionP->query($UpdateForm);
  }}
       

    $sqlP1 = "SELECT * FROM `$tlote` WHERE 1";
    $resultadoP1 = $conexionP->query($sqlP1);
     
   
   }else{
    echo "count es 0";
      $CProduct=$_SESSION['CP'];
    $tlote=$_SESSION["lotePM"];
   ECHO $CProduct;

 $newformP1="CREATE TABLE `$tlote` (ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL  , IDC VARCHAR(30) NULL , Compuesto VARCHAR(30) NULL , Funcion VARCHAR(30) NULL , Porcentaje FLOAT(10) NULL, Cantidad FLOAT(10) NULL,  Costo FLOAT(10) NULL  )";
 $resultadonewP = $conexionP->query($newformP1);

  $sqlI2 = "SELECT Porcentaje, Funcion, Compuesto, ID FROM `$CProduct` WHERE 1";
  $resultadoI2 = $conexionI->query($sqlI2);
 if ($resultadoI2->num_rows> 0) {
  while($fila2 = $resultadoI2->fetch_assoc()) {
    $PorcentC=$fila2["Porcentaje"];
    $FuncionC=$fila2["Funcion"];
    $NombreC=$fila2["Compuesto"];
     $IDCompsf=$fila2["ID"];
  $InsertP="INSERT INTO `$tlote` (Compuesto ,Porcentaje, Funcion) VALUES ('$NombreC',$PorcentC,'$FuncionC') ";

     $resultadoInsertP = $conexionP->query($InsertP);
  }}

   $sqlP1 = "SELECT * FROM `$tlote`";
  $resultadoP1 = $conexionP->query($sqlP1);

  $sqlUnion="SELECT * FROM `pesado total` UNION SELECT * FROM `$tlote`";
  $resultadosqlUnion = $conexionP->query($sqlUnion);
 if ($resultadosqlUnion->num_rows> 0) {
  while($filaU = $resultadosqlUnion->fetch_assoc()) {

    $IDCompsfU=$filaU["IDC"];
    $PorcentU=($filaU["Porcentaje"]);
    $FuncionU=$filaU["Funcion"];
    $NombreU=$filaU["Compuesto"];
     $CantidadU=$filaU["Cantidad"];
     $CostoU=$filaU["Costo"];
     ECHO $PorcentU;
  $InsertU="INSERT INTO `pesado total` (IDC , Compuesto ,Porcentaje, Funcion) VALUES (' $IDCompsfU' ,'$NombreU','$PorcentU','$FuncionU') ";

     $resultadoInsertU = $conexionP->query($InsertU);
     if ($resultadoInsertU) {}
     else{ ECHO 'Algo salio mal en la UNION';}

  }}





   }
  
  }}
              
}else{   
     $tlote=$_SESSION["lotePM"];

 $newformP1="CREATE TABLE `$tlote` (ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL  , IDC VARCHAR(30) NULL , Compuesto VARCHAR(30) NULL , Funcion VARCHAR(30) NULL , Porcentaje FLOAT(10) NULL, Cantidad FLOAT(10) NULL,  Costo FLOAT(10) NULL  )";
  
 
 $insPorcent="INSERT INTO `$tlote` (PORCENTAJE) VALUES ('')";
 $resultadonewP = $conexionP->query($newformP1);

  $sqlP1 = "SELECT * FROM `$tlote`";
  $resultadoP1 = $conexionP->query($sqlP1);

}
}else{
  //echo 'NO EXISTE COUNT';
  //echo "alho salio mal en la creacion o consulta";
  //$sqlI1 = "SELECT * FROM `p-dta-001`WHERE 1";
  //$resultadoI1 = $conexionI->query($sqlI1);
  //REVISAR
}


?>