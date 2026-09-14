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
</div>
</body>