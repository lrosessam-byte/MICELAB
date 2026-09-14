<!Doctype HTML>
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate, no-store">
<meta http-equiv="Pragma" content="no-cache">
<head>
    <title>MiceLab Pro Max</title>
    <link rel="shortcut icon" href="log.jpg" />
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<div id='dlog'  >
    <img id='imglogf' src="FONDOLOG1.png" >
    <img id='imgLF' src="MICELAB.png" >
</div>
<div id='dlogin'>
    <form action="" method="POST"> 
    <!-- Agrupación de datos personales -->

<div class="contcamp">
        <!-- Campo de texto -->
        <label for="nombre" class='textl'>Usuario:</label>
        <input type="text" id="nombre" name="nombre" required>
</div>   <!-- Campo de correo -->
<div class="contcamp">
        <label for="contrasena" class='textl'>Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required >

</div>

      <input name="enviar" type="submit" style='display:block; float:right;font-family:fantasy;color: #10183f68;' value="Enviar">
</form>

</div>

<?php
include("ConexionADMIN.php");
include("controlador.php");

?>
</body>
