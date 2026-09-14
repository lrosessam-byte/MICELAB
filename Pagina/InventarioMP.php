<!Doctype HTML>
<!-- No guardar cache de usuarios -->
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate, no-store">
<meta http-equiv="Pragma" content="no-cache">
<head>
    <title>Inventario de MP</title>
    <link rel="shortcut icon" href="LOGO2.png" />
    <link rel="stylesheet" href="styles.css">
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  height:50px;

}

tr:nth-child(even) {
  background-color: #dddddd;
}

.DatoInv{
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


</style>    
</head>

<body>

<script src="script.js"></script>
<div id='bar'>
       <div class="dlogo">
        <img class="logo" src="LOGO2.png">
    </div> 
  <div id="adminInd">
<?php
session_start();
include("ConexionADMIN.php");
include ("Conexioninv.php");
include ("ConexionRC.php");

$ConsultaIguales="SELECT Nombre,ID COUNT(*) AS Veces FROM ingresomp GROUP BY Nombre HAVING COUNT(*) > 1;";

/* $ConsultaExistC="SELECT Nombre, SUM(Cantidad) AS total FROM ingresomp GROUP BY Nombre;
"SELECT Nombre, SUM(Cantidad) AS total, Precio, GROUP_CONCAT(Lote) AS lotes FROM ingresomp GROUP BY Nombre "
// "SELECT `pdpt001-001`.Compuesto,(`pdrb001-001`.Cantidad+`pdpt001-001`.Cantidad) AS total, COUNT(`pdrb001-001`.Compuesto) AS cantidad_filas FROM `pdpt001-001` INNER JOIN `pdrb001-001` ON `pdpt001-001`.`Compuesto` = `pdrb001-001`.Compuesto GROUP BY `pdpt001-001`.Compuesto "
 */

$NombreUsuario = $_SESSION["NombreSession"];
echo "Bienvenido admin:  <br> " .$NombreUsuario;
?> 
  </div> 
    <div class="menu">
           <div class="botonm">
            Areas 
           </div> 
           <div class="botonm">
           Inventario
          </div> 
          <div class="botonm">
          Productos
          </div> 
    </div>
  </div>
     
<div id="cuerpo">
       
<h2>Inventario de materias primas Actual</h2>

<form method="POST" action="">
  <input name="Agregar" type="submit" style='display:block; float:right;font-family:fantasy;color: #10183f68;' value="Agregar fila">

  <input name="Guardar" type="submit" style='display:block; float:right;font-family:fantasy;color: #10183f68;' value="Guardar cambios">
<table>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Proveedor</th>
    <th>Cantidad (kg)</th>
    <th>Precio $MX</th>
    <th>Fecha de Ingreso</th>
    <th>Lote</th>
    <th>Quitar fila</th>
  </tr>

 <?php

// INVESTIGAR PONER TODO EN UNA LINEA DE CODIGO 
   $sqlRid1= "SET @num:=0";
   $sqlRid2="UPDATE inventario SET ID= @num:=(@num+1)";
   $sqlRid3="ALTER TABLE inventario AUTO_INCREMENT = 1";
   $resultadoIR1 = $conexionI->query($sqlRid1);
   $resultadoIR2 = $conexionI->query($sqlRid2);
   $resultadoIR3 = $conexionI->query($sqlRid3);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Procesar los datos del formulario aquí


    // 2. Redirección para actualizar la página y limpiar el POST
    header("Location: " . $_SERVER['PHP_SELF']);}
function insertar (){
   include ("Conexioninv.php");
$sqlIM = "INSERT INTO Inventario (Nombre) VALUES ('')";

$resultadoIns = $conexionI->query($sqlIM);
header("Location: " . $_SERVER['PHP_SELF']);
if(!$resultadoIns){
  echo ("algo ha fallado");
}
} 
if (isset($_POST['Agregar'])) {
    insertar(); 
}
function eliminar ($idE){

   include ("Conexioninv.php");
$sqlE = "DELETE FROM Inventario WHERE id = $idE";
$resultadoE = $conexionI->query($sqlE);


if(!$resultadoE){
  echo ("algo ha fallado");
}


} 

            // 3. Verificar si hay registros y mostrarlos
            if ($resultadoI->num_rows> 0) {
                while($fila = $resultadoI->fetch_assoc()) {
  
                    echo "<tr>";
                    echo "<td>" .'<input name="'.'ID[]'.'"class="DatoInv" type"text" value='."'".$fila["ID"] ."'>"."</td>";
                     echo "<td>" .'<input name="'.'Nombre[]'.'" class="DatoInv" type"text" value='."'".$fila["Nombre"] ."'>"."</td>";
                      echo "<td>" .'<input name="'.'Proveedor[]'.'"class="DatoInv" type"text" value='."'".$fila["Proveedor"] ."'>"."</td>";
                       echo "<td>" .'<input name="'.'Cantidad[]'.'" class="DatoInv" type"text" value='."'".$fila["Cantidad"] ."'>"."</td>";
                        echo "<td>" .'<input name="'.'Precio[]'.'" class="DatoInv" type"text" value='."'".$fila["Precio"] ."'>"."</td>";
                          echo "<td>" .'<input class="FechaI" name="FechaI[]" type="date" value='.$fila["FechaI"]. "></td>";
                            echo "<td>" .'<input name="'.'Lote[]'.'" class="DatoInv" type"text" value='."'".$fila["Lote"] ."'>"."</td>";
                             echo "<td>" .'  <input name="quitarF'.$fila["ID"].'" type="submit" style="display:block; float:right;font-family:fantasy;color: #10183f68;" value="-"> '."</td>";
                    echo "</tr>";
          
                    if (isset($_POST['quitarF'.$fila["ID"]])) {

                  
                      eliminar ($fila["ID"]); // Llamamos a la función


                        $sqlRid1n= "SET @num:=0";
                        $sqlRid2n="UPDATE inventario SET ID= @num:=(@num+1)";
                        $sqlRid3n="ALTER TABLE inventario AUTO_INCREMENT = 1";
                        $resultadoIR1n = $conexionI->query($sqlRid1n);
                        $resultadoIR2n = $conexionI->query($sqlRid2n);
                        $resultadoIR3n = $conexionI->query($sqlRid3n);
                        }
                     
                }//if quitar

                
            } 
            
          else {
                echo "<tr><td colspan='4'>No hay registros</td></tr>";
            }


            if (isset($_POST['Guardar'])) {
$array_Ids = $_POST['ID'];
$array_Nombres = $_POST['Nombre'];
$array_Proveedores = $_POST['Proveedor'];
$array_Cantidades = $_POST['Cantidad'];
$array_Precios = $_POST['Precio'];
$array_FechaI = $_POST['FechaI'];
$array_Lotes= $_POST['Lote'];


foreach ($array_Ids as $clave=>$IdF) {
$IdInv = $array_Ids[$clave];
	$Nombres = $array_Nombres[$clave];
  	$Proveedores = $array_Proveedores[$clave];
    	$Cantidades = $array_Cantidades[$clave];
      	$Precios = $array_Precios[$clave];
        	$FechaI = $array_FechaI[$clave];
          	$Lotes = $array_Lotes[$clave];
$consultainv = "UPDATE Inventario SET  Nombre='$Nombres', Proveedor='$Proveedores', Precio='$Precios',Lote='$Lotes',FechaI='$FechaI', Cantidad='$Cantidades' WHERE ID=$IdInv";
$resultadoAct = $conexionI->query($consultainv);
if(!$resultadoAct){
  echo ("algo ha fallado EN LA ACTUALIZACION");
}
}
}



            // 4. Cerrar conexión
            $conexionI->close();



            ?>

</table>
 <input name="Agregar" type="submit" style='display:block; float:right;font-family:fantasy;color: #10183f68;' value="Agregar fila">
</form>
    </div> 
    </div>
</body>
