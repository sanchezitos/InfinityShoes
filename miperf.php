<?php

session_start();
$usuario = $_SESSION['usuario'];
include 'conexion.php';
$bd = conectar();
$sql = "select * from Personal where usuario='$usuario'"; 
$res = mysql_query($sql);
if ($res) {
    $row = mysql_fetch_array($res);
    echo '<div class="panel-footer" id="perf"> 
            <h2 id="letra">' . $row["nombre"] . " " . $row["apellido"] . '</h2>
            <h4>Correo </h4><h4 id="letra">' . $row["correo"] . '</h4>   
            <hr>
            <h4>Miembro desde </h4><h4 id="letra">' . $row["fec_ing"] . '</h4>   
            <hr>
            <h4>Nombre de usuario </h4><h4 id="letra">' . $row["usuario"] . '</h4>   
            <hr>
           </div>';
}