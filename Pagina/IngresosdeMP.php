<!Doctype HTML>
<!-- No guardar cache de usuarios -->
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate, no-store">
<meta http-equiv="Pragma" content="no-cache">
<head>
    <title>Ingreso de MP</title>
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
  background-color: rgb(223, 255, 254);
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

#tAREA{
  font-family: sans-serif;
  font-size: 20PT;
  color: #415288;
  position: relative;
  margin-bottom: 10PX;
}
</style>    
</head>

<body>

<script src="script.js">

 
</script>
<script>

  // Guardar la posición del scroll antes de recargar
window.addEventListener('beforeunload', () => {
    sessionStorage.setItem('scrollPosition', window.scrollY);
});

// Restaurar la posición al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    const scrollPos = sessionStorage.getItem('scrollPosition');
    if (scrollPos) {
        window.scrollTo(0, parseInt(scrollPos));
        sessionStorage.removeItem('scrollPosition'); // Limpiar para evitar conflictos
    }
});
 if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual'; // Desactiva el comportamiento predeterminado
}
</script>
<div id='bar'>
       <div class="dlogo">
        <img class="logo" src="LOGO2.png">
    </div> 
    <spam id="tAREA">Área de RECIBO</spam>
  <div id="adminInd">
<?php
session_start();
include("ConexionADMIN.php");
include ("ConexionRC.php");
$NombreUsuario = $_SESSION["NombreSession"];
echo "Bienvenido admin:  <br> " .$NombreUsuario;
?> 
  </div> 

  </div>
     
<div id="cuerpo">
       
<h2>Ingreso de materia prima 15/06/2026</h2>

<form method="POST" action="">
  <input name="Agregar" type="submit" style='display:block; float:right;font-family:fantasy;color: #10183f68;' value="Agregar fila">

  <input name="Guardar" type="submit" style='display:block; float:right;font-family:fantasy;color: #10183f68;' value="Guardar cambios">
<table>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Proveedor</th>
    <th>Cantidad (kg)</th>
    <th>Precio $MX por Kg</th>
    <th>Fecha de Ingreso</th>
    <th>Lote</th>
    <th>Quitar fila</th>
  </tr>

 <?php

// INVESTIGAR PONER TODO EN UNA LINEA DE CODIGO 
   $sqlRid1= "SET @num:=0";
   $sqlRid2="UPDATE ingresomp SET ID= @num:=(@num+1)";
   $sqlRid3="ALTER TABLE ingresomp AUTO_INCREMENT = 1";
   $resultadoIR1 = $conexionRC->query($sqlRid1);
   $resultadoIR2 = $conexionRC->query($sqlRid2);
   $resultadoIR3 = $conexionRC->query($sqlRid3);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
header("Location: " . $_SERVER['PHP_SELF']);}
function insertar (){
   include ("ConexionRC.php");
$sqlIM = "INSERT INTO ingresomp (Nombre) VALUES ('')";

$resultadoIns = $conexionRC->query($sqlIM);
if(!$resultadoIns){
  echo ("algo ha fallado");
}
header("Location: " . $_SERVER['PHP_SELF']);
} 
if (isset($_POST['Agregar'])) {
    insertar(); 
}
function eliminar ($idE){

   include ("ConexionRC.php");
$sqlE = "DELETE FROM ingresomp WHERE id = $idE";
$resultadoE = $conexionRC->query($sqlE);


if(!$resultadoE){
  echo ("algo ha fallado");
}


} 

            // 3. Verificar si hay registros y mostrarlos
            if ($resultadoRC->num_rows> 0) {
                while($fila = $resultadoRC->fetch_assoc()) {
  
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
                        $sqlRid2n="UPDATE ingresomp SET ID= @num:=(@num+1)";
                        $sqlRid3n="ALTER TABLE ingresomp AUTO_INCREMENT = 1";
                        $resultadoIR1n = $conexionRC->query($sqlRid1n);
                        $resultadoIR2n = $conexionRC->query($sqlRid2n);
                        $resultadoIR3n = $conexionRC->query($sqlRid3n);
                        }
                     
                }//if quitar

                
            } 
            
          else {
                echo "<tr><td colspan='8'>No hay registros</td></tr>";
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
$consultainv = "UPDATE ingresomp SET  Nombre='$Nombres', Proveedor='$Proveedores', Precio='$Precios',Lote='$Lotes',FechaI='$FechaI', Cantidad='$Cantidades' WHERE ID=$IdInv";
$resultadoAct = $conexionRC->query($consultainv);
if(!$resultadoAct){
  echo ("algo ha fallado EN LA ACTUALIZACION");
}
}
}
            // 4. Cerrar conexión
            $conexionRC->close();



            ?>

</table>
 <input name="Agregar" type="submit" style='display:block; float:right;font-family:fantasy;color: #10183f68;' value="Agregar fila">
</form>
    </div> 
    </div>
</body>