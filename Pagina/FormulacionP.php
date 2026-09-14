<!Doctype HTML>
<!-- No guardar cache de usuarios -->
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate, no-store">
<meta http-equiv="Pragma" content="no-cache">
<head>
    <title>Formulaciones </title>
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
border: 1px solid #180474;
  text-align: left;
  height:50px;
  color: #fff;
  background: #180474;;
  text-align: center;
  width: 110px;

}
td {
  
  border: 1px solid #dddddd;
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

  width:50%; position:absolute;float:right; top:138px;left:50%; height:1000px;
}

</style>    
</head>

<body>
<script type="text/javascript">

$(window).on('beforeunload', function() {

   window.setTimeout(function() {
    $(window).scrollTop(0); 
}, 0);

});

</script>
<script src="script.js"></script>
<div id='bar'>
       <div class="dlogo">
        <img class="logo" src="LOGO2.png">
    </div> 
  <div id="adminInd">
<?php
session_start();
include("ConexionADMIN.php");
include ("ConexionI&D.php");
$NombreUsuario = $_SESSION["NombreSession"];
echo "Bienvenido:  <br> " .$NombreUsuario;

$_SESSION["verIframe"] ='';
echo $_SESSION["verIframe"];
function veriframe(){

$_SESSION["verIframe"] = "<iframe id='pagF' src='formula.php' ></iframe>";
echo $_SESSION["verIframe"];
  }
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
<!-- <form method="POST" > 
<div id ='AgregarFormulaciones'>Agregar un nuevo producto <input type="text" ><input type="SUBMIT" VALUE="+"></div>
</form>-->

       
<h2>Formulaciones de productos</h2>

<br>

<form method="POST" action="" id="tablaForm">

  <input name="Agregar" type="submit" style='display:block; float:left;font-family:fantasy;color: #10183f68;' value="Agregar fila">

  <input name="Guardar" type="submit" style='display:block; float:left;font-family:fantasy;color: #10183f68;' value="Guardar cambios">


  <table>


  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Clave </th>
    <th>Costo por kg</th>
    <th>Formula</th>
    <th>Quitar fila</th>

  </tr>
 <?php




 $newform1="CREATE TABLE `i&d`.`p-dta-001` (`ID` INT(10) NOT NULL AUTO_INCREMENT , `IDC` INT(30) NULL , `Compuesto` VARCHAR(30) NULL , `Funcion` VARCHAR(30) NULL , `Porcentaje` FLOAT(10) NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
function NuevaForm($clave, $Nombre){

include ("ConexionI&D.php");
$_SESSION['tablaName']=$clave;
$_SESSION['Pn']=$Nombre;
$SQLConsult="SELECT count(*) AS total FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'i&d') AND (TABLE_NAME ='$clave')";

$resultadoConsV = $conexionI->query($SQLConsult);

if ($resultadoConsV) {
    $filaC = $resultadoConsV->fetch_assoc();
    $cantidadC = $filaC['total']; // Aquí tienes el número en la variable
echo $cantidadC;
$_SESSION['count']=$cantidadC;
   }else{
    echo "algo salio mal con la consulta ";
   }
   
    header("Location: " . $_SERVER['PHP_SELF']); 
 
    }
 $newForm= "CREATE TABLE i&d.`p-dta-001` (`ID` INT(10) NOT NULL AUTO_INCREMENT , `Compuesto` VARCHAR(30) NULL , `Funcion` VARCHAR(30) NULL , `Costokg` FLOAT(10) NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
   $sqlRid1= "SET @num:=0";
   $sqlRid2="UPDATE Formulaciones SET ID= @num:=(@num+1)";
   $sqlRid3="ALTER TABLE Formulaciones AUTO_INCREMENT = 1";
   $resultadoIR1 = $conexionI->query($sqlRid1);
   $resultadoIR2 = $conexionI->query($sqlRid2);
   $resultadoIR3 = $conexionI->query($sqlRid3);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Procesar los datos del formulario aquí


    // 2. Redirección para actualizar la página y limpiar el POST
    header("Location: " . $_SERVER['PHP_SELF']);}  
function insertar (){
    
include ("ConexionI&D.php");
$sqlIM = "INSERT INTO Formulaciones (Nombre) VALUES ('')";

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



  include ("ConexionI&D.php");
$sqlE = "DELETE FROM Formulaciones WHERE id = $idE";
$resultadoE = $conexionI->query($sqlE);


if(!$resultadoE){
  echo ("algo ha fallado");
}


} 

            // 3. Verificar si hay registros y mostrarlos
            if ($resultadoI->num_rows> 0) {
                while($fila = $resultadoI->fetch_assoc()) {
  
                    echo "<tr>";
                    echo "<td>" .'<input name=ID[] class="DatoInv" type"text" value='."'".$fila["ID"] ."'>"."</td>";
                     echo "<td>" .'<input name=Nombre[] class="DatoInv" type"text" value='."'".$fila["Nombre"] ."'>"."</td>";
                      echo "<td>" .'<input name=Clave[] class="DatoInv" type"text" value='."'".$fila["Clave"] ."'>"."</td>";
                       echo "<td>" .'<input name=Costokg[] class="DatoInv" type"text" value='."'".$fila["Costokg"] ."'>"."</td>";
                          echo "<td>" .'  <input name="verF'.$fila["ID"].'" type="submit" style="display:block; float:right;font-family:fantasy;color: #10183f68;" value="Ver"> '."</td>";

                             echo "<td>" .'  <input name="quitarF'.$fila["ID"].'" type="submit" style="display:block; float:right;font-family:fantasy;color: #10183f68;" value="-"> '."</td>";
                    echo "</tr>";
          
                    
                    if (isset($_POST['verF'.$fila["ID"]])) {
                      NuevaForm($fila["Clave"], $fila["Nombre"]);

                    $_SESSION["visible"] ='visible';
                    header("Location: " . $_SERVER['PHP_SELF']);




                    }
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

                
            } 
            
          else {
                echo "<tr><td colspan='4'>No hay registros</td></tr>";
            }



            if (isset($_POST['Guardar'])) {
$array_Ids = $_POST['ID'];
$array_Nombres = $_POST['Nombre'];
$array_Claves= $_POST['Clave'];
$array_Costoskg = $_POST['Costokg'];


foreach ($array_Ids as $clave=>$IdF) {
$IdInv = $array_Ids[$clave];
	$Nombres = $array_Nombres[$clave];
  	$Claves = $array_Claves[$clave];
    $Costoskg = $array_Costoskg[$clave];
$consultainv = "UPDATE Formulaciones SET  Nombre='$Nombres', Clave='$Claves', Costokg='$Costoskg' WHERE ID=$IdInv";
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

<?php

if (isset($_SESSION['visible'])) {
    if($_SESSION['visible']=='visible'){


echo "<iframe id='pagF' src='formula.php' ></iframe>";
    }
} else {
    echo "";
}

  ?>


    </div> 
    </div>
</body>