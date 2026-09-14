<!Doctype HTML>
<!-- No guardar cache de usuarios -->
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate, no-store">
<meta http-equiv="Pragma" content="no-cache">
<head>
    <title>Inicio</title>
    <link rel="shortcut icon" href="LOGO2.png" />
    <link rel="stylesheet" href="styles.css">
<style>
.logoL{
  width: 110PX;
  padding-bottom:15px;
  }
  #cuerpo{
    height: 600px;
  }
  #BarLI{
height: 100%;
width: 320PX;
background: #d3f2ff;
position: absolute;

  }
.btnLI{height: 30px;
padding: 10px;
margin:0 auto;
background: #fafcff;
text-align: center;
cursor: pointer;
border-bottom: 1px solid #518686;

 font-family: 'Josefin Sans', sans-serif;
   font-size: 20px;
              border-radius: 5px;
}
.btnLIA{height: 30px;

padding:8px;
margin: 0 auto;
background: #fdfeff;
text-align: center;
 font-family: 'Josefin Sans', sans-serif;
            font-size: 15px;
              border-radius: 8px;

              cursor: pointer;
              

}

.AreasBs{
  list-style: none;
  margin: 0 auto;
  width: 80%;

}
.textlinkB{
  text-decoration: none;
  color: #0a222e;
}
#ListB{
  list-style: none;
  margin: 0 auto;
  position: relative;
}
.AreasBs{
  list-style: none;
  transition: height .4s;
  height: 0;
  overflow: hidden;

}
.btnLIA:hover{
  background: #e0e7ee;
  
}
.liBTNA{
}
.arrow{
	background: #042960;
  color:#fff;
}
ul{
  padding: 0;
  margin: 0;
}
#BotonsLI{
  margin: 0 auto;
  width: 320px;
  margin-top: 10px;
}
.liBTN{
  
}
</style>    
</head>

<body>

<div id='bar'>
       <div class="dlogo">
        <img class="logo" src="LOGO2.png">
          <img class="logoL" src="MICELAB.png">

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

<div id="BarLI">

<div id="BotonsLI">
  <ul id="ListB">
<li class="liBTN"><div class="btnLI">Areas</div>
<ul class="AreasBs">
<li class="liBTNA"><div class="btnLIA inv"><a href="" class="textlinkB">I+D </a></div></li>
<li class="liBTNA"><div class="btnLIA pre"><a href="" class="textlinkB">Premezclas </a></div></li>
<li class="liBTNA"><div class="btnLIA"><a href="inventariomp.php" class="textlinkB">Almacen </a></div></li>
<li class="liBTNA"><div class="btnLIA"><a href="" class="textlinkB">Produccion </a></div></li>
<li class="liBTNA"><div class="btnLIA"><a href="" class="textlinkB">Calidad </a></div></li>
<li class="liBTNA"><div class="btnLIA"><a href="" class="textlinkB">SG </a></div></li>
<li class="liBTNA"><div class="btnLIA rec"><a href="" class="textlinkB">Recibo </a></div></li>
</ul>





</li>
<li class="liBTN"><div class="btnLI">Cronograma</div>
<ul class="AreasBs">
<li class="liBTNA"><div class="btnLIA"><a href="" class="textlinkB">Notas</a></div></li>
<li class="liBTNA"><div class="btnLIA"><a href="" class="textlinkB">Actividades </a></div></li>

</ul>

</li>
</ul>

</div>

</div>

</div>
<script src="Script.js" DEFER></script>
</body>