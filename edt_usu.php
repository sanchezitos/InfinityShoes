<?php

include 'conexion.php';
$bd = conectar();
session_start();
$usuario = $_SESSION['usuario'];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$cad = "UPDATE Personal SET  nombre='$nombre', apellido='$apellido', correo='$correo' where usuario='$usuario'";
$res = mysql_query($cad, $bd);

if($res){
    echo '4';
}else{
    echo '1';
    mysql_error();
}
?>