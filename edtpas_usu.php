<?php

include 'conexion.php';
$bd = conectar();
session_start();
$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];
$contrasenaact = $_POST["contrasenaact"];
$contrasenanew = $_POST["contrasenanew"];
$contrasenaconf = $_POST["contrasenaconf"];

if ($contrasena != $contrasenaact) {
    echo '1';
} else {
    $cad = "UPDATE Personal SET  contrasena='$contrasenaconf' where usuario='$usuario'";
    $res = mysql_query($cad, $bd);
    if ($res) {
        $_SESSION['contrasena'] = $contrasenaconf;
        echo '0';
        
    }
}
?>