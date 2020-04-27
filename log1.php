<?php

session_start();
include 'conexion.php';
$bd = conectar();
$usuario = $_POST["usu"];
$contrasena = $_POST["pas"];

$sql = "Select * from Personal where usuario='$usuario' and contrasena='$contrasena'";
$res = mysql_query($sql, $bd) or die("Problemas al ejecutar la consulta...");
if ($row = mysql_fetch_array($res)) {
    if ( $row['rol']=="administrador") {
        $_SESSION["nombre"] = $row['nombre'];
        $_SESSION["apellido"] = $row['apellido'];
        $_SESSION["codigo"] = $row['idpersonal'];
        $_SESSION["sucursal"] = $row['idsucursal'];
        $_SESSION["cedula"] = $row['cedula'];
        $_SESSION["direccion"] = $row['direccion'];
        $_SESSION["rol"] = $row['rol'];
        $_SESSION["usuario"] = $row['usuario'];
        $_SESSION["contrasena"] = $row['contrasena'];

        echo 'usuario.php';
    } else {
        
        if ($row['rol'] = "vendedor") {
           
                $_SESSION["nombre"] = $row2['nom_usu'];
                $_SESSION["apellido"] = $row2['ape_usu'];
                $_SESSION["codigo"] = $row2['idusuario'];
                $_SESSION["usuario"] = $row2['usuario'];
                $_SESSION["contrasena"] = $row2['contrasena'];
                $_SESSION["pass_autor"] = $row2['pass_autor'];
                $_SESSION["pass_admin"] = $row2['pass_admin'];
                echo 'autor.php';
              
            
        } else {
            echo '1';
        }
    }
} else {
    echo '1';
}





