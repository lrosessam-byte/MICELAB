<?php
session_start();
if(!empty($_POST["enviar"])){
    $username=$_POST["nombre"];
    $contrasena=$_POST["contrasena"];
    $sql=$conexion->query("select * from administradores where Username='$username' and Password='$contrasena'");
    if($datos=$sql->fetch_object()){
        $_SESSION["ObjDatos"]=$datos;
        $_SESSION["NombreSession"]=$datos->Nombre;
        header('location:indice.php');
    }else{
        echo '<div id="mensajesL" style="display: block;
	position: relative;
	width:300px;
	position: absolute; top: 82%; left: 50%; 
    transform: translate(-50%, -50%);
    text-align: center;
    background:#ff6e6e;
    font-size:14pt;
  font-family: Times New Roman, Times, serif;
     
     "> Sin acceso ';
     
    }
}
?>