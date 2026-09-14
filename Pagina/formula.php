 <!Doctype HTML>
<!-- No guardar cache de usuarios -->
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate, no-store">
<meta http-equiv="Pragma" content="no-cache">
<head>
    <title>Formula</title>
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
border: 1px solid #fafafa;
  text-align: left;
  height:50px;
  color: #fff;
  background: #180474;;
  text-align: center;


}
td {
  border: 1px solid #000000;
  text-align: left;
  height:50px;
  text-align: center;
}

tr:nth-child(even) {
  background-color: #dddddd;
    text-align: center;
}

.DatoInv{
    text-align: center;
background: transparent;
border:none;
position: relative;
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
include ("validacionForms.php");?>
<div id="cuerpo">

<br>

<form method="POST" action="" id="tablaForm">

  <input name="Agregar" type="submit" style='display:block; float:left;font-family:fantasy;color: #10183f68;' value="Agregar fila">

  <input name="Guardar" type="submit" style='display:block; float:left;font-family:fantasy;color: #10183f68;' value="Guardar cambios">


  <table>


  <tr>
    <th>ID</th>
    <th colspan="2">ID del compuesto</th>
    <th>Compuesto</th>
    <th>Funcion</th>
    <th>Porcentaje %p/p</th>
       <th>Costo p/kg </th>
    <th>Quitar fila</th>

  </tr>
 <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Procesar los datos del formulario aquí


    // 2. Redirección para actualizar la página y limpiar el POST
header("Location: " . $_SERVER['PHP_SELF']);}




echo $_SESSION["Pn"]."  ";

echo $_SESSION["tablaName"]."";



function insertar ($tablaN){
include ("ConexionI&D.php");
echo $tablaN .'<br>';
$sqlIM = "INSERT INTO `$tablaN` (Compuesto) VALUES ('')";
$resultadoIns = $conexionI->query($sqlIM);
header("Location: " . $_SERVER['PHP_SELF']);

if(!$resultadoIns){
  echo ("algo ha fallado");
}
} 
if (isset($_POST['Agregar'])) {
    insertar($_SESSION["tablaName"]); 
}
function buscarIDC($IDCB,$IDB){

include ("ConexionI&D.php");
include ("validacionForms.php");
include("ConexionRC.php");
$BuscaIDC="SELECT * FROM ingresomp WHERE ID= $IDCB";
$resultadoIDCB = $conexionRC->query($BuscaIDC);

if ($resultadoIDCB->num_rows> 0) {
                while($filab = $resultadoIDCB->fetch_assoc()) {
                $filabN=$filab["Nombre"];
                
$InsNom="UPDATE `$Nombretabla` SET Compuesto= '$filabN' WHERE ID= $IDB";

$resultadoInsNom= $conexionI->query($InsNom);
if(!$resultadoInsNom){
  echo ('<BR>'."algo ha fallado en update");
}
}}

if(!$resultadoIDCB){
  echo ('<BR>'."algo ha fallado");
}

}


function eliminar ($idE){



  include ("ConexionI&D.php");
  
 
include ("validacionForms.php");
$sqlE = "DELETE FROM `$Nombretabla` WHERE id = $idE";
$resultadoE = $conexionI->query($sqlE);


if(!$resultadoE){
  echo ("algo ha fallado");
}


} 


function calculodecosto(){

include ("ConexionI&D.php");
include ("validacionForms.php");
include("ConexionRC.php");

$busquedaPrecios="SELECT Precio, Nombre FROM `ingresomp`";
$resultadoBPrecios = $conexionRC->query($busquedaPrecios);


 if ($resultadoBPrecios->num_rows> 0) {
  $i=1;

  while($filaPrecios = $resultadoBPrecios->fetch_assoc()) {

$Pnom=$filaPrecios["Nombre"];
$Precnom=$filaPrecios["Precio"];
$busquedaPorcentajes="SELECT Porcentaje FROM `$Nombretabla` WHERE Compuesto='$Pnom'";
$resultadoBPorcentajes = $conexionI->query($busquedaPorcentajes);
if($resultadoBPorcentajes){
 if ($resultadoBPorcentajes->num_rows> 0) {
                while($filaPorcentajes = $resultadoBPorcentajes->fetch_assoc()) {
$Porcnom=$filaPorcentajes["Porcentaje"];
$PrecioporCOmp=(float)$Porcnom*(float)$Precnom/100;
$UPDTPPC="UPDATE `$Nombretabla` SET Costo=$PrecioporCOmp WHERE Compuesto='$Pnom'";
$rUPDTPPC = $conexionI->query($UPDTPPC);


$f[$i]= $PrecioporCOmp;
$i=$i+1;
}}}

}}
if(isset($f)){

$totalCosto = array_sum($f);
echo "<br> el coto total es = ".$totalCosto;
$totalCosto;
$defCosto="UPDATE formulaciones SET Costokg= '$totalCosto' WHERE CLAVE='$Nombretabla'";

$resultadodefCosto= $conexionI->query($defCosto);
}


}
calculodecosto();
            // 3. Verificar si hay registros y mostrarlos
            if ($resultadoI1->num_rows> 0) {
                while($fila = $resultadoI1->fetch_assoc()) {

                    echo "<tr>";
                    echo "<td>" .'<input name=ID[] class="DatoInv" type"text" value='."'".$fila["ID"] ."'>"."</td>";
                       echo "<td style='border-right-color: transparent;'>" .'<input name=IDC[] class="DatoInv" type"text" value='."'".$fila["IDC"] ."'>"."</td>";
                        echo "<td style='border-left-color: transparent;'>".'<input name="IDC'.$fila["ID"].'" type="submit" style="display:block; float:right;font-family:fantasy;color: #10183f68;" value="B">'."</td>";
                     echo "<td '>" .'<input name=Compuesto[] class="DatoInv" type"text" value='."'".$fila["Compuesto"] ."'>"."</td>";
  
                       echo "<td>" .'<input name=Funcion[] class="DatoInv" type"text" value='."'".$fila["Funcion"] ."'>"."</td>";
                       echo "<td>" .'<input name=Porcentaje[] class="DatoInv" type"text" value='."'".$fila["Porcentaje"] ."'>"."</td>";

                       echo "<td>" .'<input name=Costo[] class="DatoInv" type"text" value='."'".$fila["Costo"] ."'>"."</td>";

                             echo "<td>" .'  <input name="quitarF'.$fila["ID"].'" type="submit" style="display:block; float:right;font-family:fantasy;color: #10183f68;" value="-">';
                    echo "</tr>";
                    $idForm=$fila["ID"];
                     if (isset($_POST['IDC'.$fila["ID"]])) {
                        Guardar();

                       $IDCbusc = "SELECT * FROM `$Nombretabla` WHERE ID=$idForm ";

                       $resultadoIDCbusc = $conexionI->query($IDCbusc);


                      if ($resultadoIDCbusc->num_rows> 0) {
                while($filabid = $resultadoIDCbusc->fetch_assoc()) {
              buscarIDC($filabid["IDC"],$filabid["ID"]);

                }}
                        
                        

                      

                     }
                    if (isset($_POST['quitarF'.$fila["ID"]])) {

                  
                      eliminar ($fila["ID"]); // Llamamos a la función


                        $sqlRid1n= "SET @num:=0";
                        $sqlRid2n="UPDATE `$Nombretabla` SET ID= @num:=(@num+1)";
                        $sqlRid3n="ALTER TABLE `$Nombretabla` AUTO_INCREMENT = 1";
                        $resultadoIR1n = $conexionI->query($sqlRid1n);
                        $resultadoIR2n = $conexionI->query($sqlRid2n);
                        $resultadoIR3n = $conexionI->query($sqlRid3n);
                        }
                     
                }//if quitar

                
            } 
            
          else {
                echo "<tr><td colspan='8' style='width:100%;'>No hay formulacion</td></tr>";
            }

function Guardar(){

include ("validacionForms.php");
$array_Ids = $_POST['ID'];
$array_Compuestos = $_POST['Compuesto'];
$array_IDCs= $_POST['IDC'];
$array_Funciones= $_POST['Funcion'];
$array_Porcentajes = $_POST['Porcentaje'];


foreach ($array_Ids as $clave=>$IdF) {
$IdInv = $array_Ids[$clave];
	$Compuestos = $array_Compuestos[$clave];
  $IDCs=$array_IDCs[$clave];
  	$Funciones = $array_Funciones[$clave];
    $Porcentajes = $array_Porcentajes[$clave];
$consultainv = "UPDATE `$Nombretabla` SET  Compuesto='$Compuestos', IDC='$IDCs', Funcion='$Funciones', Porcentaje='$Porcentajes' WHERE ID=$IdInv";
$resultadoAct = $conexionI->query($consultainv);
if(!$resultadoAct){
  echo ("algo ha fallado EN LA ACTUALIZACION");
}
}
}

            if (isset($_POST['Guardar'])) {
              Guardar();
              calculodecosto();
              
 
}
         
            // 4. Cerrar conexión
            $conexionI->close();
            ?>
 <input name="Agregar" type="submit" style='display:block; float:right;font-family:fantasy;color: #10183f68;' value="Agregar fila">

</table>

    </div> 
    </div>
</body>
