<?php

session_start();
include 'conexion.php';
$bd = conectar();
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$codigo = $_SESSION['codigo'];

$sql = "Select * from Personal";
$res = mysql_query($sql, $bd);
while ($row = mysql_fetch_array($res)) {
    if ($row["usuario"] ==$usuario) {
        echo '1';
        return;
    }
}
$sql1 = "Select * from Personal where idpersonal='$codigo'";
$res1 = mysql_query($sql1, $bd);
$row1 = mysql_fetch_array($res1);
$usuval = $row['usuario'];
$sucursal = $row1['idsucursal'];
if ($usuario == $usuval) {
    echo '1';
} else {
    $sql2 = "select curdate()";
    $resf = mysql_query($sql2, $bd) or die("Problemas al ejecutar la consulta...");
    $muestraf = mysql_fetch_array($resf);
    $fecha = $muestraf["curdate()"];
    $reg = "INSERT INTO `Personal`(`idsucursal`, `nombre`, `apellido`, `cedula`, `direccion`, `celular`, `rol`, `usuario`, `contrasena`, `fec_ing`, `correo`) VALUES "
            . "                  ('$sucursal','$nombre','$apellido','$cedula','$direccion','$celular','vendedor','$usuario','$contrasena','$fecha','$correo')";
    $res2 = mysql_query($reg, $bd);
    if ($res2) {
        echo '0';
    } else {

        echo 'Algo esta mal :/';
        echo $nombre;
        echo $apellido;
        echo $correo;
        echo $usuario;
        echo $contrasena;

        mysql_error();
    }
}