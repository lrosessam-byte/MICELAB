<!Doctype HTML>
<!-- No guardar cache de usuarios -->
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate, no-store">
<meta http-equiv="Pragma" content="no-cache">
<head>
    <title>Premezclas </title>
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
  font-size: 8PT;

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
   font-size: 8Pt;
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
  width:50%;
  text-align: center;
  display: block;
}
#BotonesTf{
  display:block;
  width: 100%;
}
#pagF{
  border:none;

  width:50%; position:absolute;float:right; top:146px;left:50%; height:1000px;
}

#tAREA{
  font-family: sans-serif;
  font-size: 20PT;
  color: #41884b;
}
</style>    
</head>

<body>

<script src="script.js"></script>
<div id='bar'>
       <div class="dlogo">
        <img class="logo" src="LOGO2.png">
    </div> 
    <spam id="tAREA">Área de Premezclas</spam>
  <div id="adminInd">
<?php

// Se inicia sesion para enlazar las paginas
session_start();
include("ConexionADMIN.php");
include ("ConexionI&D.php");
include ("ConexionPM.php");// Entrega ConexionP y ResultadoP

// Se recibe informacion de variasbles de sesion
$NombreUsuario = $_SESSION["NombreSession"];
echo "Bienvenido:  <br> " .$NombreUsuario;

// Variable de iframe
$_SESSION["verIframe"] ='';
echo $_SESSION["verIframe"];


// Recarga la pagina cada que se envia informacion por metodo Post   
if ($_SERVER['REQUEST_METHOD'] == 'POST') {header("Location: " . $_SERVER['PHP_SELF']);}  




// Funcicion de ver IFRAME 
function veriframe(){

$_SESSION["verIframe"] = "<iframe id='pagF' src='formula-pesar.php' ></iframe>";
echo $_SESSION["verIframe"];
  }
?> 

  </div> 
  </div>
     
<div id="cuerpo">
<!-- <form method="POST" > 
<div id ='AgregarFormulaciones'>Agregar un nuevo producto <input type="text" ><input type="SUBMIT" VALUE="+"></div>
</form>-->
<h2>Pesado de insumos</h2>
<br>
<form method="POST" action="" id="tablaForm">
<input name="Guardar" type="submit" style='display:block; float:left;font-family:fantasy;color: #10183f68;' value="Guardar cambios">
<table>
<tr>
    <th>ID</th>
    <th>Fecha</th>
    <th>Lote</th>
    <th colspan="2" >Clave </th>
    <th>Producto</th>

    <th>Cantidad</th>
    <th>Costo</th>
    <th>Formula</th>
    <th>Quitar fila</th>
</tr>
 <?php



 // RECIBE Resultado de consulta
 if ($resultadoP->num_rows> 0) {
                while($fila = $resultadoP->fetch_assoc()) {
  
                echo "<tr>";
                  echo "<td>" .'<input name=ID[] class="DatoInv" type"text" value='."'".$fila["ID"] ."'>"."</td>";
                   echo "<td>" .'<input class="FechaI DatoInv" name="Fecha[]" type="date" value='.$fila["Fecha"]. "></td>";
                    echo "<td>" .'<input name=Lote[] class="DatoInv" type"text" value='."'".$fila["Lote"] ."'>"."</td>";
                    
                    echo "<td style='border-right-color: transparent; width:100px'>" .'<input name=CP[] class="DatoInv" type"text" value='."'".$fila["CP"] ."'>"."</td>";
                       echo "<td style='border-left-color: transparent;'>".'<input name="CP'.$fila["ID"].'" type="submit" style="display:block; float:right;font-family:fantasy;color: #10183f68;" value="B">'."</td>";
                    echo "<td>" .'<input name=Producto[] class="DatoInv" type"text" value='."'".$fila["Producto"] ."'>"."</td>";
                    echo "<td>" .'<input name=Cantidad[] class="DatoInv" type"text" value='."'".$fila["Cantidad"] ."'>"."</td>";
                       echo "<td>" .'<input name=Costo[] class="DatoInv" type"text" value='."'".$fila["Costo"] ."'>"."</td>";
                        echo "<td>" .'  <input name="verF'.$fila["ID"].'" type="submit" style="display:block; float:right;font-family:fantasy;color: #10183f68;" value="Ver"> '."</td>";
                         echo "<td>" .'  <input name="quitarF'.$fila["ID"].'" type="submit" style="display:block; float:right;font-family:fantasy;color: #10183f68;" value="-"> '."</td>";
                  echo "</tr>";

                  if (isset($_POST['verF'.$fila["ID"]])) {
  include ("ValidacionFormsPM.php");

// Dirigue a la funcion VerificacionF verifica si existe ya un registro con la clave y el producto y fecha
VerificacionF($fila["Lote"], $fila["Producto"], $fila["CP"]);
$_SESSION["visiblePM"] ='visible';


   


/* if ($resultadoI2->num_rows> 0) {
  while($fila2 = $resultadoI2->fetch_assoc()) {
    $PorcentC=$fila2["Porcentaje"];
    $FuncionC=$fila2["Funcion"];
    $InsertP="INSERT INTO `$tlote` (Porcentaje) VALUES ($PorcentC) ";
    $InsertF="INSERT INTO `$tlote` (Funcion) VALUES ('$FuncionC')";
     $resultadoInsertP = $conexionP->query($InsertP);
      $resultadoInsertF = $conexionP->query($InsertF);
    ECHO "".$fila2["Porcentaje"]." ".$fila2["Funcion"];



  }}*/

                    }
                   $idForm=$fila["ID"];
                     if (isset($_POST['CP'.$fila["ID"]])) {
                        Guardar();
                       $IDCbusc = "SELECT * FROM historicopm WHERE ID=$idForm ";

                       $resultadoCPbusc = $conexionP->query($IDCbusc);


                      if ($resultadoCPbusc->num_rows> 0) {
                while($filabid = $resultadoCPbusc->fetch_assoc()) {
           
              buscarCP($filabid["CP"],$filabid["ID"]);

                }}
                        
                        

                      

                     }
// Si se oprime ver 

                    if (isset($_POST['quitarF'.$fila["ID"]])) {

                  
                      eliminar ($fila["ID"]); // Llamamos a la función


                        $sqlRid1n= "SET @num:=0";
                        $sqlRid2n="UPDATE Formulaciones SET ID= @num:=(@num+1)";
                        $sqlRid3n="ALTER TABLE Formulaciones AUTO_INCREMENT = 1";
                        $resultadoIR1n = $conexionI->query($sqlRid1n);
                        $resultadoIR2n = $conexionI->query($sqlRid2n);
                        $resultadoIR3n = $conexionI->query($sqlRid3n);
                        }
                     
                }//if quitar
} // If de consulta a Base de datos
else {
echo "<tr><td colspan='8'>No hay registros</td></tr>";
}// sI no hay filas aun

 //Revisar
 $newform1="CREATE TABLE `i&d`.`p-dta-0 01` (`ID` INT(10) NOT NULL AUTO_INCREMENT , `IDC` INT(30) NULL , `Compuesto` VARCHAR(30) NULL , `Funcion` VARCHAR(30) NULL , `Porcentaje` FLOAT(10) NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
function VerificacionF($LotePM, $ProductoPM,$CProduct){
//REVISAR SI SE NECESITA CONEXION CON I&D AQUI
include ("ConexionI&D.php");

include ("ConexionPM.php");
$_SESSION['lotePM']=$LotePM;
$_SESSION['ProductoPM']=$ProductoPM;
$_SESSION['CP']=$CProduct;
ECHO $CProduct;

$SQLConsultPM="SELECT count(*) AS total FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'i&d') AND (TABLE_NAME ='$CProduct')";

$resultadoConsPM = $conexionI->query($SQLConsultPM);

if ($resultadoConsPM) {
    $filaCPM = $resultadoConsPM->fetch_assoc();
    $cantidadCPM = $filaCPM['total']; // Aquí tienes el número en la variable

echo $cantidadCPM;
echo "Peticion correcta";
$_SESSION['countPM']=$cantidadCPM;
   }else{
    echo "algo salio mal con la consulta ";
   }
   
    //header("Location: " . $_SERVER['PHP_SELF']); 


 }

 // revisar
$newForm= "CREATE TABLE i&d.`p-dta-001` (`ID` INT(10) NOT NULL AUTO_INCREMENT , `Compuesto` VARCHAR(30) NULL , `Funcion` VARCHAR(30) NULL , `Costokg` FLOAT(10) NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
   
// Actualiza el ID CONSTANTEMENTE
   $sqlRid1= "SET @num:=0";
   $sqlRid2="UPDATE historicoPM SET ID= @num:=(@num+1)";
   $sqlRid3="ALTER TABLE historicoPM AUTO_INCREMENT = 1";
   $resultadoIR1 = $conexionP->query($sqlRid1);
   $resultadoIR2 = $conexionP->query($sqlRid2);
   $resultadoIR3 = $conexionP->query($sqlRid3);


function insertar (){ 
include ("ConexionPM.php");
$sqlIPM = "INSERT INTO historicoPM (Lote) VALUES ('')";

$resultadoInsPM = $conexionP->query($sqlIPM);


if(!$resultadoInsPM ){
  echo ("algo ha fallado");
}
} 
if (isset($_POST['Agregar'])) {
    insertar(); 
}

function eliminar ($idE){

include ("ConexionPM.php");
$sqlE = "DELETE FROM historicoPM WHERE id = $idE";
$resultadoE = $conexionP->query($sqlE);

if(!$resultadoE){
  echo ("algo ha fallado");
}


} 

 //Verificar si hay registros y mostrarlos
function buscarCP ($CPB,$IDB){

include ("ConexionI&D.php");
include("ConexionPM.php");
$BuscaCP="SELECT * FROM formulaciones WHERE Clave= '$CPB'";
$resultadoCPB = $conexionI->query($BuscaCP);

if ($resultadoCPB->num_rows> 0) {
                while($filab = $resultadoCPB->fetch_assoc()) {
                $filabN=$filab["Nombre"];
                echo  $filabN;
                
$InsNom="UPDATE historicopm SET Producto= '$filabN' WHERE ID= $IDB";

$resultadoInsNom= $conexionP->query($InsNom);
if(!$resultadoInsNom){
  echo ('<BR>'."algo ha fallado en update");
}
}}

if(!$resultadoCPB){
  echo ('<BR>'."algo ha fallado");
}

}

function Guardar(){

include("ConexionPM.php");

$array_Ids = $_POST['ID'];
$array_Fechas = $_POST['Fecha'];
$array_Lotes= $_POST['Lote'];
$array_Claves= $_POST['CP'];
$array_Productos= $_POST['Producto'];
$array_Cantidades = $_POST['Cantidad'];
$array_Costos = $_POST['Costo'];

foreach ($array_Ids as $clave=>$IdF) {
$IdInv = $array_Ids[$clave];
	$Fechas = $array_Fechas[$clave];
  	$Lotes = $array_Lotes[$clave];
        $Claves = $array_Claves[$clave];
    $Productos = $array_Productos[$clave];
    $Cantidades = $array_Cantidades[$clave];
    $Costos= $array_Costos[$clave];
$consultainv = "UPDATE historicoPM SET  Fecha='$Fechas', Lote='$Lotes', CP='$Claves',Producto='$Productos', Cantidad='$Cantidades', Costo='$Costos' WHERE ID=$IdInv";
$resultadoAct = $conexionP->query($consultainv);
if(!$resultadoAct){
  echo ("algo ha fallado EN LA ACTUALIZACION");
}
}
}

            if (isset($_POST['Guardar'])) {
              Guardar();

              
 
}
         
//Cerrar conexión
$conexionP->close();
?>

</table>
 <input name="Agregar" type="submit" style='display:block; float:right;font-family:fantasy;color: #10183f68;' value="Agregar fila">
</form>

<?php

if (isset($_SESSION['visiblePM'])) {
    if($_SESSION['visiblePM']=='visible'){


echo "<iframe id='pagF' src='formula-pesar.php' ></iframe>";
    }
} else {
    echo "";
}

  ?>


    </div> 
    </div>
</body>