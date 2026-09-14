 <!Doctype HTML>
<!-- No guardar cache de usuarios -->
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate, no-store">
<meta http-equiv="Pragma" content="no-cache">
<head>
    <title>`p-dta-001 </title>
    <link rel="shortcut icon" href="LOGO2.png" />
    <link rel="stylesheet" href="styles.css">
<style>
tbody {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  text-align: center;
  display: block;
  
}


th{
border: 1px solid #ffffff;
  text-align: left;
  height:50px;
  color: #fff;
  background: #1d942d;;
  text-align: center;
  width: 110px;
  font-size: 9PT;

}
td {
  
  border: 1px solid #dddddd;
  text-align: left;
  height:50px;
  text-align: center;
 


}

tr:nth-child(even) {
  background-color: #d3ffe4;
    text-align: center;
    
}

.DatoInv{
    text-align: center;
background: transparent;
border:none;
position: relative;
   font-size: 9Pt;
width: 100%;
height: 100%;

}

.FechaI{
background: none;
border:none;
position: relative;
width: 100%;
height: 100%;

}

#tablaForm{
  position: absolute;
  float:left;
  left:10%;
  width:80%;
  text-align: center;
  display: block;
}
#BotonesTf{
  display:block;
  width: 100%;
}


</style>    
</head>

<body>


<?php
session_start();
include("ConexionADMIN.php");
include ("ConexionI&D.php");
include ("validacionFormsPM.php");?>
<div id="cuerpo">

<br>

<form method="POST" action="" id="tablaForm">

  <input name="Agregar" type="submit" style='display:block; float:left;font-family:fantasy;color: #10183f68;' value="Agregar fila">

  <input name="Guardar" type="submit" style='display:block; float:left;font-family:fantasy;color: #10183f68;' value="Guardar cambios">


  <table>


  <tr>
    <th>ID</th>
    <th>ID del compuesto</th>
    <th>Compuesto</th>
    <th>Funcion</th>
    <th>Porcentaje %p/p</th>
        <th>Cantidad</th>
    <th>Costo</th>
    <th>Quitar fila</th>

  </tr>
 <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Procesar los datos del formulario aquí

 //Redirección para actualizar la página y limpiar el POST
    header("Location: " . $_SERVER['PHP_SELF']);}

echo $_SESSION["lotePM"]."  ";

echo $_SESSION["ProductoPM"]."";

function insertar ($tablaN){
include ("ConexionPM.php");
echo $tablaN .'<br>';
$sqlIM = "INSERT INTO `$tablaN` (Compuesto) VALUES ('')";
$resultadoIns = $conexionP->query($sqlIM);
header("Location: " . $_SERVER['PHP_SELF']);

if(!$resultadoIns){
  echo ("algo ha fallado");
}
} 
if (isset($_POST['Agregar'])) {
    insertar($_SESSION["lotePM"]); 
}

function eliminar ($idE){



  include ("ConexionI&D.php");
  
 
include ("validacionFormsPM.php");
$sqlE = "DELETE FROM `$tlote` WHERE id = $idE";
$resultadoE = $conexionP->query($sqlE);


if(!$resultadoE){
  echo ("algo ha fallado");
}


} 

            // 3. Verificar si hay registros y mostrarlos
            if ($resultadoP1->num_rows> 0) {
                while($fila = $resultadoP1->fetch_assoc()) {
  
                    echo "<tr>";
                    echo "<td>" .'<input name=ID[] class="DatoInv" type"text" value='."'".$fila["ID"] ."'>"."</td>";
                       echo "<td>" .'<input name=IDC[] class="DatoInv" type"text" value='."'".$fila["IDC"] ."'>"."</td>";
                     echo "<td>" .'<input name=Compuesto[] class="DatoInv" type"text" value='."'".$fila["Compuesto"] ."'>"."</td>";
  
                       echo "<td>" .'<input name=Funcion[] class="DatoInv" type"text" value='."'".$fila["Funcion"] ."'>"."</td>";
                       echo "<td>" .'<input name=Porcentaje[] class="DatoInv" type"text" value='."'".$fila["Porcentaje"] ."'>"."</td>";
                       echo "<td>" .'<input name=Cantidad[] class="DatoInv" type"text" value='."'".$fila["Cantidad"] ."'>"."</td>";
                        echo "<td>" .'<input name=Costo[] class="DatoInv" type"text" value='."'".$fila["Costo"] ."'>"."</td>";
                             echo "<td>" .'  <input name="quitarF'.$fila["ID"].'" type="submit" style="display:block; float:right;font-family:fantasy;color: #10183f68;" value="-"> '."</td>";
                    echo "</tr>";
          
                    if (isset($_POST['quitarF'.$fila["ID"]])) {

                  
                      eliminar ($fila["ID"]); // Llamamos a la función


                        $sqlRid1n= "SET @num:=0";
                        $sqlRid2n="UPDATE `$tlote` SET ID= @num:=(@num+1)";
                        $sqlRid3n="ALTER TABLE `$tlote` AUTO_INCREMENT = 1";
                        $resultadoIR1n = $conexionP->query($sqlRid1n);
                        $resultadoIR2n = $conexionP->query($sqlRid2n);
                        $resultadoIR3n = $conexionP->query($sqlRid3n);
                        }
                     
                }//if quitar

                
            } 
            
          else {
                echo "<tr><td colspan='8' style='width:100%;'>No hay registros</td></tr>";
            }



            if (isset($_POST['Guardar'])) {
              
 
include ("validacionFormsPM.php");
$array_Ids = $_POST['ID'];
$array_IDCs= $_POST['IDC'];
$array_Compuestos = $_POST['Compuesto'];
$array_Funciones= $_POST['Funcion'];
$array_Porcentajes = $_POST['Porcentaje'];
$array_Cantidades = $_POST['Cantidad'];
$array_Costos = $_POST['Costo'];


foreach ($array_Ids as $clave=>$IdF) {
$IdInv = $array_Ids[$clave];
	$Compuestos = $array_Compuestos[$clave];
  $IDCs=$array_IDCs[$clave];
  	$Funciones = $array_Funciones[$clave];
    $Porcentajes= $array_Porcentajes[$clave];
    $Cantidades= $array_Cantidades[$clave];
    $Costos = $array_Costos[$clave];
$consultainv = "UPDATE `$tlote` SET  Compuesto='$Compuestos', IDC='$IDCs', Funcion='$Funciones', Porcentaje ='$Porcentajes',Cantidad='$Cantidades', Costo='$Costos' WHERE ID=$IdInv";
$resultadoAct = $conexionP->query($consultainv);
if(!$resultadoAct){
  echo ("algo ha fallado EN LA ACTUALIZACION");
}
}

header("Location: " . $_SERVER['PHP_SELF']);

}
         
            // 4. Cerrar conexión
            $conexionP->close();
            ?>

</table>

    
    
</bo
